<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FamosoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Publicacion;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::middleware(['auth'])->group(function () {



    Route::get('/nada', function () {
        return view('nda');
    });

    /* Route::get('/publicaciones/index', [PublicacionController::class, 'index'])->name('index'); */

    Route::get('/show/{publicacion}', [PublicacionController::class, 'show'])->name('show');


    Route::resource('carritos', CarritoController::class);

    Route::resource('productos', ProductoController::class);

    Route::resource('perfil', PerfilController::class);

    Route::get('view-category/{slug}', [ProductsController::class,'viewcategory']);

    Route::resource('publicaciones', PublicacionController::class);

    Route::post('/carritos/meter/{producto}', [CarritoController::class, 'anadiralcarrito'])
        ->name('anadiralcarrito');

    Route::post('/carritos/restar/{carrito}', [CarritoController::class, 'restar'])
        ->name('restar');

    Route::post('/carritos/sumar/{carrito}', [CarritoController::class, 'sumar'])
        ->name('sumar');

    Route::post('/carritos/vaciar', [CarritoController::class, 'vaciar'])
        ->name('vaciar');

    Route::post('/carritos/total', [CarritoController::class, 'total'])
        ->name('total');

    Route::post('/carritos/factura', [CarritoController::class, 'pedido'])
        ->name('pedido');
});

require __DIR__.'/auth.php';
