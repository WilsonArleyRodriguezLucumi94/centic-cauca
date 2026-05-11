<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\ProfileController;

// ─── RUTAS PÚBLICAS ───
Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalogo', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalogo/producto/{slug}', [CatalogController::class, 'show'])->name('catalog.show');

// ─── AUTENTICACIÓN ───
require __DIR__.'/auth.php';

// ─── RUTAS PROTEGIDAS ───
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    Route::prefix('admin')->name('admin.')->group(function () {
        
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        // Productos
        Route::resource('products', ProductController::class);
        Route::delete('/products/bulk-delete', [ProductController::class, 'bulkDestroy'])
            ->name('products.bulk-destroy');
        
        // Categorías
        Route::resource('categories', CategoryController::class);
        
        // Marcas
        Route::resource('brands', BrandController::class);
        
        // Clientes
        Route::resource('customers', CustomerController::class);
        
        // Cotizaciones
        Route::resource('quotations', QuotationController::class);
        Route::patch('/quotations/{quotation}/status', [QuotationController::class, 'changeStatus'])
            ->name('quotations.status');
        
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});