<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
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


/* con esta Route se pasa un parametro en el navegador y lo regresa
// variable y parametro original slug  y $slug
//en el navegador escribir http://127.0.0.1:8000/blog/orale

Route::get('/blog/{noslug}', function ($noslug) {
    // simula consulta a base de datos
    return 'capturamos esto: ' .$noslug;
});  */


/* Con esta Route se mandan peticiones http por ejemplo
en el navegador escribir http://127.0.0.1:8000/buscar?query=php

Route::get('buscar', function (Request $request) {
    return $request->all();
});  */



// AL instalar Breeze  se agregan automaticamente estas lineas
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Importar un controlador que se va a utilizar
Route::resource('posts', PostController::class)->except(['show']);

require __DIR__.'/auth.php';
