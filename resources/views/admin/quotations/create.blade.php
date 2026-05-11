@extends('layouts.admin')

@section('title', 'Nueva Cotización')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Nueva Cotización</h1>
        <a href="{{ route('admin.quotations.index') }}" class="btn btn-sm" style="background: var(--surface); border: 1px solid var(--border); color: var(--text);">← Volver</a>
    </div>

    <form action="{{ route('admin.quotations.store') }}" method="POST" id="quotation-form" style="background: var(--card); border: 1px solid var(--border); border-radius: 12px; padding: 2rem;">
        @csrf

        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Cliente</label>
                <select name="customer_id" class="form-select" required>
                    <option value="">Seleccionar cliente...</option>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                            {{ $customer->name }} ({{ $customer->document_number }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Fecha de Emisión</label>
                <input type="date" name="issue_date" class="form-input" value="{{ old('issue_date', now()->format('Y-m-d')) }}" required>
            </div>
        </div>

        <div style="margin: 2rem 0; padding: 1.5rem; background: rgba(0,212,255,0.03); border: 1px solid rgba(0,212,255,0.1); border-radius: 12px;">
            <h3 style="font-family: 'Syne'; font-size: 1.1rem; margin-bottom: 1rem; color: var(--accent);">📦 Productos</h3>
            
            <div id="items-container">
                <!-- Los items se agregan dinámicamente -->
            </div>

            <button type="button" onclick="addItem()" class="btn btn-sm" style="background: rgba(0,212,255,0.1); border: 1px solid rgba(0,212,255,0.3); color: var(--accent); margin-top: 1rem;">
                + Agregar Producto
            </button>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem; padding: 1.5rem; background: var(--surface); border-radius: 10px;">
            <div style="text-align: center;">
                <div style="font-size: 0.75rem; color: var(--muted); text-transform: uppercase;">Subtotal</div>
                <div style="font-family: 'Syne'; font-size: 1.3rem; font-weight: 700;" id="subtotal">$0</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 0.75rem; color: var(--muted); text-transform: uppercase;">IVA (19%)</div>
                <div style="font-family: 'Syne'; font-size: 1.3rem; font-weight: 700;" id="tax">$0</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 0.75rem; color: var(--accent); text-transform: uppercase;">TOTAL</div>
                <div style="font-family: 'Syne'; font-size: 1.5rem; font-weight: 800; color: var(--accent);" id="total">$0</div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Observaciones Generales</label>
            <textarea name="observations" class="form-textarea" rows="3" placeholder="Condiciones de pago, tiempo de entrega, garantía...">{{ old('observations') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Generar Cotización</button>
    </form>

    <script>
        let itemCount = 0;
        const products = @json($products);

        function addItem() {
            const container = document.getElementById('items-container');
            const index = itemCount++;
            
            const div = document.createElement('div');
            div.className = 'form-grid';
            div.style.marginBottom = '1rem';
            div.style.padding = '1rem';
            div.style.background = 'var(--bg)';
            div.style.borderRadius = '8px';
            div.id = `item-${index}`;
            
            div.innerHTML = `
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Producto</label>
                    <select name="items[${index}][product_id]" class="form-select product-select" required onchange="updatePrice(${index})">
                        <option value="">Seleccionar...</option>
                        ${products.map(p => `<option value="${p.id}" data-price="${p.price}">${p.name} - $${p.price.toLocaleString('es-CO')}</option>`).join('')}
                    </select>
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Cantidad</label>
                    <input type="number" name="items[${index}][quantity]" class="form-input quantity-input" value="1" min="1" required onchange="calculateTotal()">
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Precio Unit.</label>
                    <input type="number" name="items[${index}][unit_price]" class="form-input price-input" value="0" min="0" required onchange="calculateTotal()">
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">Obs.</label>
                    <input type="text" name="items[${index}][observations]" class="form-input" placeholder="Nota...">
                </div>
                <div style="display: flex; align-items: flex-end; padding-bottom: 0.5rem;">
                    <button type="button" onclick="removeItem(${index})" class="btn btn-danger btn-sm">Eliminar</button>
                </div>
            `;
            
            container.appendChild(div);
        }

        function updatePrice(index) {
            const select = document.querySelector(`#item-${index} .product-select`);
            const priceInput = document.querySelector(`#item-${index} .price-input`);
            const option = select.options[select.selectedIndex];
            
            if (option.dataset.price) {
                priceInput.value = option.dataset.price;
                calculateTotal();
            }
        }

        function removeItem(index) {
            document.getElementById(`item-${index}`).remove();
            calculateTotal();
        }

        function calculateTotal() {
            let subtotal = 0;
            
            document.querySelectorAll('[id^="item-"]').forEach(item => {
                const qty = parseFloat(item.querySelector('.quantity-input').value) || 0;
                const price = parseFloat(item.querySelector('.price-input').value) || 0;
                subtotal += qty * price;
            });
            
            const tax = subtotal * 0.19;
            const total = subtotal + tax;
            
            document.getElementById('subtotal').textContent = '$' + subtotal.toLocaleString('es-CO');
            document.getElementById('tax').textContent = '$' + tax.toLocaleString('es-CO');
            document.getElementById('total').textContent = '$' + total.toLocaleString('es-CO');
        }

        // Agregar primer item por defecto
        addItem();
    </script>
@endsection