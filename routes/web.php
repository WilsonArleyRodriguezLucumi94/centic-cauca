<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;

// ─── RUTAS PÚBLICAS (Catálogo) ───
Route::get('/', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalogo', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalogo/producto/{slug}', [CatalogController::class, 'show'])->name('catalog.show');

// ─── RUTAS DE AUTENTICACIÓN (Breeze) ───
require __DIR__.'/auth.php';

// ─── RUTAS PROTEGIDAS (Admin) ───
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard - ruta simple sin prefix
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Admin con prefix
    Route::prefix('admin')->name('admin.')->group(function () {
        
        // Dashboard Admin
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        
        // Gestión de Productos (CRUD completo)
        Route::resource('products', ProductController::class);
        
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});