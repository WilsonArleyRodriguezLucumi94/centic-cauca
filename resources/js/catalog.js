// resources/js/catalog.js
import './bootstrap';



// Tu JavaScript original adaptado
let currentFilter = 'all';

function setFilter(cat, btn) {
    currentFilter = cat;
    document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    
    const banner = document.getElementById('promoBanner');
    if (banner) {
        banner.style.display = (cat === 'all' || cat === 'impresora') ? '' : 'none';
    }
    
    applyFilters();
    
}

function applyFilters() {
    const query = document.getElementById('searchInput').value.toLowerCase().trim();
    const sort = document.querySelector('.sort-select').value;
    
    // Aquí puedes hacer fetch a tu API o filtrar el DOM
    // Para Laravel, lo ideal es recargar con los parámetros:
    const url = new URL(window.location.href);
    url.searchParams.set('category', currentFilter);
    url.searchParams.set('search', query);
    url.searchParams.set('sort', sort);
    window.location.href = url.toString();
}

function fmt(n) {
    return '$' + n.toLocaleString('es-CO');
}



// Exportar para uso global si es necesario
window.setFilter = setFilter;
window.applyFilters = applyFilters;

