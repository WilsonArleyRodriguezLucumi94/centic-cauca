<?php
// app/Http/Controllers/Admin/CustomerController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $customers = Customer::active()
            ->search($request->get('search'))
            ->latest()
            ->paginate(20);

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'document_type' => 'required|in:cedula,nit',
            'document_number' => 'required|string|unique:customers',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'nullable|string|max:100',
            'observations' => 'nullable|string|max:2000',
        ]);

        $validated['is_active'] = true;

        Customer::create($validated);

        return redirect()->route('admin.customers.index')
            ->with('success', 'Cliente creado exitosamente');
    }

    public function edit(Customer $customer)
    {
        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'document_type' => 'required|in:cedula,nit',
            'document_number' => 'required|string|unique:customers,document_number,' . $customer->id,
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'city' => 'nullable|string|max:100',
            'observations' => 'nullable|string|max:2000',
        ]);

        $customer->update($validated);

        return redirect()->route('admin.customers.index')
            ->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy(Customer $customer)
    {
        // Verificar si tiene cotizaciones
        if ($customer->quotations()->count() > 0) {
            return redirect()->route('admin.customers.index')
                ->with('error', 'No se puede eliminar: tiene ' . $customer->quotations()->count() . ' cotizaciones asociadas');
        }

        $customer->update(['is_active' => false]);

        return redirect()->route('admin.customers.index')
            ->with('success', 'Cliente eliminado exitosamente');
    }
}