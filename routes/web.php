<?php

use App\Http\Controllers\ctrlBienvenida;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ctrlDatos;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/holisss', function () {
    return view('holiss');
});

Route::get('/miruta', [ctrlBienvenida::class, 'Bienvenidos']);
Route::get('/ctrlBienvenida', [ctrlBienvenida::class, 'Bienvenidos']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//vista con datos
Route::get('/datos', [ctrlDatos::class, 'AccesoDatosVista']);

//Vista con datos link
Route::get('/datoslink', [ctrlDatos::class, 'AccesoDatosVistaLink']);

//Vista con datos holisss
Route::get('/datosholisss', [ctrlDatos::class, 'AccesoDatosVistaHolisss']);

//Vista con datos link propio
Route::get('/datoslinkpropio', [ctrlDatos::class, 'AccesoDatosVistaLinkPropio']);

//Vista de detalle de registros
Route::get('/detalle/{id}', [ctrlDatos::class, 'detalle'])->name('tj.detalle');

// CRUD web categorias y productos
//Route::resource('categories', CategoryController::class);
//Route::resource('products', ProductController::class);

require __DIR__.'/auth.php';
