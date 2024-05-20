<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ruta para la página de inicio
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas de autenticación
Auth::routes();

// Rutas de productos
    Route::middleware(['auth'])->group(function () {
    Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
    Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
    Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
});

// Rutas de perfil
    Route::middleware(['auth'])->group(function () {
    Route::get('/perfil/edit', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::post('/perfil/update', [PerfilController::class, 'update'])->name('perfil.update');
});

// Rutas de productos (nuevas)
Route::get('/products', [ProductController::class, 'products'])->name('productos');

// Rutas del carrito de compras
    Route::middleware(['auth'])->group(function () {
    Route::post('cart/add', [CartController::class, 'add'])->name('add');
    Route::get('cart/checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('cart/clear', [CartController::class, 'clear'])->name('clear');
    Route::post('cart/removeitem', [CartController::class, 'removeItem'])->name('removeitem');
});


