<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\PublicacionController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\SaveController;
use App\Http\Controllers\FamosoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\SaveProController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ValoracionController;
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

// Route::get('/', function () {
//     return view('aria.index');
// })->name('index');

// Route::get('/', function () {
//     return view('aria.notuser');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::middleware(['auth'])->group(function () {



    Route::get('/show/publicacion/{publicacion}', [PublicacionController::class, 'show'])->name('show/publicacion');

    Route::get('/show/producto{producto}', [ProductoController::class, 'show'])->name('show/producto');

    Route::resource('carritos', CarritoController::class);

    Route::resource('productos', ProductoController::class);

    Route::resource('perfil', PerfilController::class);

    Route::resource('liveware', Livewire::class);

    Route::post('/destroy/{publicacion}', [ValoracionController::class, 'destroy'])
    ->name('destroy');

    Route::post('/store/{publicacion}', [ValoracionController::class, 'store'])
    ->name('store');

    Route::post('/publicaciones/save/{publicacion}', [SaveController::class, 'anadiralperfil'])
        ->name('anadiralperfil');

    Route::post('/productos/save/{producto}', [SaveProController::class, 'productoperfil'])
        ->name('productoperfil');

        Route::post('/publicaciones/unsave/{publicacion}', [SaveController::class, 'unsave'])
        ->name('unsave');

    Route::post('/anadircomentario', [ComentarioController::class, 'anadircomentario'])
    ->name('anadircomentario');

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

    // Route::post('/carritos/factura', [CarritoController::class, 'pedido'])
    //     ->name('pedido');

    Route::post('/carritos/factura', [StripePaymentController::class, 'stripe'])
    ->name('stripe');

    Route::get('stripe', [StripePaymentController::class, 'stripe']);

    Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
});

require __DIR__.'/auth.php';
