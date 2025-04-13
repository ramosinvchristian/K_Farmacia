<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AdminController;

// Ruta pública
Route::get('/', function () {
    return view('welcome');
});

// Ruta del dashboard (requiere login y verificación)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/reporte', [AdminController::class, 'reporteForm'])->name('admin.reporte.form');
    Route::post('/admin/reporte', [AdminController::class, 'generarReporte'])->name('admin.reporte.resultado');
    Route::post('/admin/reporte/pdf', [AdminController::class, 'reportePDF'])->name('admin.reporte.pdf');
    
});
// Grupo de rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/cliente', [ClienteController::class, 'inicio'])->name('cliente.inicio');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
    Route::get('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/pagar', [CarritoController::class, 'pagar'])->name('carrito.pagar');
    Route::get('/cliente/historial', [ClienteController::class, 'historial'])->name('cliente.historial');


    // CRUD de medicamentos (solo para admins)
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::resource('medicamentos', MedicamentoController::class);
    });
});



require __DIR__.'/auth.php';
