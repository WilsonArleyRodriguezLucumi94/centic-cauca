@extends('layouts.admin')

@section('title', 'Clientes')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Gestión de Clientes</h1>
        <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">+ Nuevo Cliente</a>
    </div>

    <table class="data-table">
        <thead>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Cotizaciones</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>
                    <span class="badge" style="background: rgba(0,212,255,0.1); color: var(--accent); border: 1px solid rgba(0,212,255,0.2);">
                        {{ $customer->getDocumentTypeLabel() }}
                    </span>
                    <code style="display: block; margin-top: 0.3rem; background: var(--surface); padding: 0.2rem 0.4rem; border-radius: 4px; font-size: 0.75rem;">
                        {{ $customer->document_number }}
                    </code>
                </td>
                <td style="font-weight: 600;">{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ Str::limit($customer->address, 40) }}</td>
                <td>{{ $customer->city ?? '-' }}</td>
                <td>
                    <span class="badge badge-success">{{ $customer->quotations_count }}</span>
                </td>
                <td>
                    <div style="display: flex; gap: 0.5rem;">
                        <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-sm" style="background: var(--surface); border: 1px solid var(--border); color: var(--text);">Editar</a>
                        <form action="{{ route('admin.customers.destroy', $customer) }}" method="POST" onsubmit="return confirm('¿Eliminar este cliente?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 1.5rem;">
        {{ $customers->links() }}
    </div>
@endsection