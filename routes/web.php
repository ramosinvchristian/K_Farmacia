<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Ruta redireccionadora por rol después del login
Route::get('/redirect', function () {
    $user = Auth::user();

    if ($user->rol === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($user->rol === 'cliente') {
        return redirect()->route('cliente.inicio');
    }

    abort(403);
})->middleware('auth')->name('redirect');

// Ruta general "dashboard" para compatibilidad con vistas antiguas
Route::get('/dashboard', function () {
    $user = Auth::user();
    return $user->rol === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('cliente.inicio');
})->middleware('auth')->name('dashboard');

// Rutas del administrador
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/reporte', [AdminController::class, 'reporteForm'])->name('admin.reporte.form');
    Route::post('/admin/reporte', [AdminController::class, 'generarReporte'])->name('admin.reporte.resultado');
    Route::post('/admin/reporte/pdf', [AdminController::class, 'reportePDF'])->name('admin.reporte.pdf');

    // CRUD de medicamentos
    Route::resource('medicamentos', MedicamentoController::class);
});

// Rutas para usuarios autenticados (clientes o admins)
Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Vista de cliente
    Route::get('/cliente', [ClienteController::class, 'inicio'])->name('cliente.inicio');
    Route::get('/cliente/historial', [ClienteController::class, 'historial'])->name('cliente.historial');
    Route::get('/cliente/ticket/{venta_id}', [ClienteController::class, 'generarTicket'])->name('cliente.ticket');

    // Carrito
    Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
    Route::get('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
    Route::post('/carrito/pagar', [CarritoController::class, 'pagar'])->name('carrito.pagar');
});

require __DIR__.'/auth.php';

