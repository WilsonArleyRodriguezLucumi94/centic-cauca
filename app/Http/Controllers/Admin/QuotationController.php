<?php
// app/Http/Controllers/Admin/QuotationController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class QuotationController extends Controller
{
    public function index(Request $request)
    {
        // Actualizar cotizaciones vencidas automáticamente
        Quotation::pending()->expired()->update(['status' => 'vencida']);

        $quotations = Quotation::with(['customer', 'user'])
            ->active()
            ->search($request->get('search'))
            ->latest()
            ->paginate(20);

        return view('admin.quotations.index', compact('quotations'));
    }

    public function create()
    {
        $customers = Customer::active()->orderBy('name')->get();
        $products = Product::active()->with(['category', 'brand'])->get();

        return view('admin.quotations.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'issue_date' => 'required|date',
            'observations' => 'nullable|string|max:3000',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.observations' => 'nullable|string|max:500',
        ]);

        // Generar número de cotización
        $lastQuotation = Quotation::latest()->first();
        $nextNumber = $lastQuotation ? (int)substr($lastQuotation->quotation_number, -4) + 1 : 1;
        $quotationNumber = 'COT-' . now()->year . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        // Calcular fechas
        $issueDate = Carbon::parse($validated['issue_date']);
        $expirationDate = $issueDate->copy()->addDays(15);

        // Calcular totales
        $subtotal = 0;
        foreach ($validated['items'] as $item) {
            $subtotal += $item['quantity'] * $item['unit_price'];
        }
        $tax = $subtotal * 0.19; // IVA 19%
        $total = $subtotal + $tax;

        // Crear cotización
        $quotation = Quotation::create([
            'quotation_number' => $quotationNumber,
            'customer_id' => $validated['customer_id'],
            'user_id' => Auth::id(),
            'issue_date' => $issueDate,
            'expiration_date' => $expirationDate,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'status' => 'pendiente',
            'observations' => $validated['observations'] ?? null,
            'is_active' => true,
        ]);

        // Crear items
        foreach ($validated['items'] as $item) {
            QuotationItem::create([
                'quotation_id' => $quotation->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['quantity'] * $item['unit_price'],
                'observations' => $item['observations'] ?? null,
            ]);
        }

        return redirect()->route('admin.quotations.index')
            ->with('success', 'Cotización ' . $quotationNumber . ' creada exitosamente. Válida hasta ' . $expirationDate->format('d/m/Y'));
    }

    public function show(Quotation $quotation)
    {
        $quotation->load(['customer', 'user', 'items.product.category', 'items.product.brand']);
        $quotation->checkExpiration();

        return view('admin.quotations.show', compact('quotation'));
    }

    public function edit(Quotation $quotation)
    {
        $quotation->load('items.product');
        $customers = Customer::active()->orderBy('name')->get();
        $products = Product::active()->with(['category', 'brand'])->get();

        return view('admin.quotations.edit', compact('quotation', 'customers', 'products'));
    }

    public function update(Request $request, Quotation $quotation)
    {
        // No permitir editar si ya está aprobada o vencida
        if (in_array($quotation->status, ['aprobada', 'vencida'])) {
            return redirect()->route('admin.quotations.index')
                ->with('error', 'No se puede editar una cotización ' . $quotation->getStatusLabel());
        }

        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'issue_date' => 'required|date',
            'observations' => 'nullable|string|max:3000',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'items.*.observations' => 'nullable|string|max:500',
        ]);

        // Recalcular fechas
        $issueDate = Carbon::parse($validated['issue_date']);
        $expirationDate = $issueDate->copy()->addDays(15);

        // Recalcular totales
        $subtotal = 0;
        foreach ($validated['items'] as $item) {
            $subtotal += $item['quantity'] * $item['unit_price'];
        }
        $tax = $subtotal * 0.19;
        $total = $subtotal + $tax;

        // Actualizar cotización
        $quotation->update([
            'customer_id' => $validated['customer_id'],
            'issue_date' => $issueDate,
            'expiration_date' => $expirationDate,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'total' => $total,
            'observations' => $validated['observations'] ?? null,
        ]);

        // Eliminar items anteriores y recrear
        $quotation->items()->delete();
        foreach ($validated['items'] as $item) {
            QuotationItem::create([
                'quotation_id' => $quotation->id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['unit_price'],
                'total_price' => $item['quantity'] * $item['unit_price'],
                'observations' => $item['observations'] ?? null,
            ]);
        }

        return redirect()->route('admin.quotations.index')
            ->with('success', 'Cotización ' . $quotation->quotation_number . ' actualizada exitosamente');
    }

    public function destroy(Quotation $quotation)
    {
        $quotation->update(['is_active' => false]);

        return redirect()->route('admin.quotations.index')
            ->with('success', 'Cotización eliminada exitosamente');
    }

    /**
     * Cambiar estado de la cotización
     */
    public function changeStatus(Request $request, Quotation $quotation)
    {
        $validated = $request->validate([
            'status' => 'required|in:pendiente,aprobada,rechazada',
        ]);

        $quotation->update(['status' => $validated['status']]);

        return redirect()->route('admin.quotations.index')
            ->with('success', 'Cotización marcada como ' . $quotation->getStatusLabel());
    }
}