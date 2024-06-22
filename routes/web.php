<?php
// para majejar solicitudes http
use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*  Se puede escribir separadas o creando un grupo como el de abajo

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/blog', [PageController::class, 'blog'])->name('blog');

 Route::get('blog/{slug}', [PageController::class, 'post'])->name('post');
 */

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'home')->name('home');

    Route::get('/blog', 'blog')->name('blog');

    Route::get('blog/{post:slug}', 'post')->name('post');
});


// con esto pasas un parametro en el navegador y lo regresa
// variable y parametro original slug  y $slug
//en el navegador escribir http://127.0.0.1:8000/blog/orale
Route::get('/blog/{noslug}', function ($noslug) {
    // simula consulta a base de datos
    return 'capturamos esto: ' .$noslug;
});

//Con esto se mandan peticiones http
//en el navegador escribir http://127.0.0.1:8000/buscar?query=php
Route::get('buscar', function (Request $request) {
    return $request->all();
});
