@extends('layouts.admin')

@section('title', 'Cotización ' . $quotation->quotation_number)

@section('content')
    <div class="page-header">
        <div>
            <h1 class="page-title">Cotización {{ $quotation->quotation_number }}</h1>
            <div style="color: var(--muted); font-size: 0.85rem; margin-top: 0.3rem;">
                Creada por {{ $quotation->user->name }} el {{ $quotation->created_at->format('d/m/Y H:i') }}
            </div>
        </div>
        <div style="display: flex; gap: 1rem;">
            <a href="{{ route('admin.quotations.index') }}" class="btn btn-sm" style="background: var(--surface); border: 1px solid var(--border); color: var(--text);">← Volver</a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <h3 style="font-family: 'Syne'; font-size: 0.9rem; color: var(--muted); text-transform: uppercase; margin-bottom: 1rem;">Cliente</h3>
            <div style="font-weight: 700; font-size: 1.1rem;">{{ $quotation->customer->name }}</div>
            <div style="color: var(--muted); font-size: 0.85rem; margin-top: 0.3rem;">
                {{ $quotation->customer->getDocumentTypeLabel() }}: {{ $quotation->customer->document_number }}<br>
                {{ $quotation->customer->phone }}<br>
                {{ $quotation->customer->address }}
            </div>
        </div>
        
        <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem;">
            <h3 style="font-family: 'Syne'; font-size: 0.9rem; color: var(--muted); text-transform: uppercase; margin-bottom: 1rem;">Información</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.8rem;">
                <div>
                    <div style="font-size: 0.75rem; color: var(--muted);">Emisión</div>
                    <div style="font-weight: 600;">{{ $quotation->issue_date->format('d/m/Y') }}</div>
                </div>
                <div>
                    <div style="font-size: 0.75rem; color: var(--muted);">Vencimiento</div>
                    <div style="font-weight: 600; {{ $quotation->isExpired() ? 'color: #ff006e;' : '' }}">
                        {{ $quotation->expiration_date->format('d/m/Y') }}
                    </div>
                </div>
                <div>
                    <div style="font-size: 0.75rem; color: var(--muted);">Estado</div>
                    <span class="badge" style="background: {{ $quotation->getStatusColor() }}22; color: {{ $quotation->getStatusColor() }}; border: 1px solid {{ $quotation->getStatusColor() }}44;">
                        {{ $quotation->getStatusLabel() }}
                    </span>
                </div>
                <div>
                    <div style="font-size: 0.75rem; color: var(--muted);">Validez</div>
                    <div style="font-weight: 600;">15 días</div>
                </div>
            </div>
        </div>
    </div>

    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; overflow: hidden; margin-bottom: 2rem;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: var(--surface);">
                    <th style="padding: 1rem; text-align: left; font-size: 0.75rem; text-transform: uppercase; color: var(--muted);">Producto</th>
                    <th style="padding: 1rem; text-align: center; font-size: 0.75rem; text-transform: uppercase; color: var(--muted);">Cant.</th>
                    <th style="padding: 1rem; text-align: right; font-size: 0.75rem; text-transform: uppercase; color: var(--muted);">Precio Unit.</th>
                    <th style="padding: 1rem; text-align: right; font-size: 0.75rem; text-transform: uppercase; color: var(--muted);">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($quotation->items as $item)
                <tr style="border-bottom: 1px solid var(--border);">
                    <td style="padding: 1rem;">
                        <div style="font-weight: 600;">{{ $item->product->name }}</div>
                        <div style="font-size: 0.8rem; color: var(--muted);">{{ $item->product->sku }}</div>
                        @if($item->observations)
                            <div style="font-size: 0.75rem; color: var(--accent); margin-top: 0.3rem;">{{ $item->observations }}</div>
                        @endif
                    </td>
                    <td style="padding: 1rem; text-align: center;">{{ $item->quantity }}</td>
                    <td style="padding: 1rem; text-align: right; font-family: 'Syne';">${{ number_format($item->unit_price, 0, ',', '.') }}</td>
                    <td style="padding: 1rem; text-align: right; font-family: 'Syne'; font-weight: 700;">${{ number_format($item->total_price, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot style="background: var(--surface);">
                <tr>
                    <td colspan="3" style="padding: 1rem; text-align: right; color: var(--muted);">Subtotal</td>
                    <td style="padding: 1rem; text-align: right; font-family: 'Syne'; font-weight: 600;">${{ number_format($quotation->subtotal, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="3" style="padding: 1rem; text-align: right; color: var(--muted);">IVA (19%)</td>
                    <td style="padding: 1rem; text-align: right; font-family: 'Syne'; font-weight: 600;">${{ number_format($quotation->tax, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td colspan="3" style="padding: 1.2rem 1rem; text-align: right; font-family: 'Syne'; font-size: 1.1rem; color: var(--accent); font-weight: 800;">TOTAL</td>
                    <td style="padding: 1.2rem 1rem; text-align: right; font-family: 'Syne'; font-size: 1.3rem; font-weight: 800; color: var(--accent);">${{ number_format($quotation->total, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </div>

    @if($quotation->observations)
    <div style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 1.5rem; margin-bottom: 2rem;">
        <h3 style="font-family: 'Syne'; font-size: 0.9rem; color: var(--muted); text-transform: uppercase; margin-bottom: 0.8rem;">Observaciones</h3>
        <p style="color: var(--text-secondary); line-height: 1.7; white-space: pre-line;">{{ $quotation->observations }}</p>
    </div>
    @endif
@endsection