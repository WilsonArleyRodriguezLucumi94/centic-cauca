"use strict";

require("./bootstrap");

// resources/js/catalog.js
// Tu JavaScript original adaptado
var currentFilter = 'all';

function setFilter(cat, btn) {
  currentFilter = cat;
  document.querySelectorAll('.filter-btn').forEach(function (b) {
    return b.classList.remove('active');
  });
  btn.classList.add('active');
  var banner = document.getElementById('promoBanner');

  if (banner) {
    banner.style.display = cat === 'all' || cat === 'impresora' ? '' : 'none';
  }

  applyFilters();
}

function applyFilters() {
  var query = document.getElementById('searchInput').value.toLowerCase().trim();
  var sort = document.querySelector('.sort-select').value; // Aquí puedes hacer fetch a tu API o filtrar el DOM
  // Para Laravel, lo ideal es recargar con los parámetros:

  var url = new URL(window.location.href);
  url.searchParams.set('category', currentFilter);
  url.searchParams.set('search', query);
  url.searchParams.set('sort', sort);
  window.location.href = url.toString();
}

function fmt(n) {
  return '$' + n.toLocaleString('es-CO');
} // Exportar para uso global si es necesario


window.setFilter = setFilter;
window.applyFilters = applyFilters;
//# sourceMappingURL=catalog.dev.js.map
