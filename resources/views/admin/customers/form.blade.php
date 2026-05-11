@extends('layouts.admin')

@section('title', isset($customer) ? 'Editar Cliente' : 'Nuevo Cliente')

@section('content')
    <div class="page-header">
        <h1 class="page-title">{{ isset($customer) ? 'Editar' : 'Nuevo' }} Cliente</h1>
        <a href="{{ route('admin.customers.index') }}" class="btn btn-sm" style="background: var(--surface); border: 1px solid var(--border); color: var(--text);">← Volver</a>
    </div>

    <form action="{{ isset($customer) ? route('admin.customers.update', $customer) : route('admin.customers.store') }}" 
          method="POST" 
          style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 2rem;">
        
        @csrf
        @if(isset($customer)) @method('PUT') @endif

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Tipo de Documento</label>
                <select name="document_type" class="form-select" required>
                    <option value="cedula" {{ (old('document_type', $customer->document_type ?? '') == 'cedula') ? 'selected' : '' }}>Cédula</option>
                    <option value="nit" {{ (old('document_type', $customer->document_type ?? '') == 'nit') ? 'selected' : '' }}>NIT</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Número de Documento</label>
                <input type="text" name="document_number" class="form-input" value="{{ old('document_number', $customer->document_number ?? '') }}" required placeholder="123456789">
                @error('document_number')<span style="color: var(--danger); font-size: 0.8rem;">{{ $message }}</span>@enderror
            </div>

            <div class="form-group">
                <label class="form-label">Nombre Completo / Razón Social</label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $customer->name ?? '') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-input" value="{{ old('email', $customer->email ?? '') }}" placeholder="cliente@email.com">
            </div>

            <div class="form-group">
                <label class="form-label">Teléfono</label>
                <input type="text" name="phone" class="form-input" value="{{ old('phone', $customer->phone ?? '') }}" required placeholder="312 856 4727">
            </div>

            <div class="form-group">
                <label class="form-label">Ciudad</label>
                <input type="text" name="city" class="form-input" value="{{ old('city', $customer->city ?? '') }}" placeholder="Popayán">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Dirección</label>
            <input type="text" name="address" class="form-input" value="{{ old('address', $customer->address ?? '') }}" required placeholder="Calle 10 # 5-30">
        </div>

        <div class="form-group">
            <label class="form-label">Observaciones</label>
            <textarea name="observations" class="form-textarea" rows="3" placeholder="Notas adicionales sobre el cliente...">{{ old('observations', $customer->observations ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($customer) ? 'Actualizar Cliente' : 'Crear Cliente' }}
        </button>
    </form>
@endsection