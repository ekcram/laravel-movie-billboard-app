<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Models\Pelicula;
use App\Http\Middleware\EmpresarioMiddleware;
use App\Http\Middleware\Authenticate;

Route::get('/', function () {
    return view('inicio');
});
Route::get('/inicio', function () {
    return view('inicio');
});

/**
 * Rutas a las que solo puede acceder el usuario empresario.
 */

Route::middleware([Authenticate::class, EmpresarioMiddleware::class])->group(function(){
    
Route::get('/peliculas', 'App\Http\Controllers\PeliculaController@index');
Route::get('/peliculas/create', 'App\Http\Controllers\PeliculaController@create')->name('peliculas.create');
Route::get('/comprar-entradas', 'App\Http\Controllers\EntradaController@create')->name('entradas.create');
Route::post('/peliculas', 'App\Http\Controllers\PeliculaController@store')->name('peliculas.store');
Route::post('/entradas', 'App\Http\Controllers\EntradaController@store')->name('entradas.store');
Route::get('/aforo', 'App\Http\Controllers\EntradaController@index');
Route::get('/peliculas/borrar', 'App\Http\Controllers\PeliculaController@listarDelete');
    
Route::resource('peliculas', PeliculaController::class);

});

/**
 * Rutas a las que solo puede acceder el usuario cliente, y también el empresario
 */
 Route::middleware([Authenticate::class])->group(function(){
    Route::get('/peliculas', 'App\Http\Controllers\PeliculaController@index');
    Route::get('/comprar-entradas', 'App\Http\Controllers\EntradaController@create')->name('entradas.create');
    Route::post('/entradas', 'App\Http\Controllers\EntradaController@store')->name('entradas.store');
    Route::get('/aforo', 'App\Http\Controllers\EntradaController@index');
 });


require __DIR__.'/auth.php';
