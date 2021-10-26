<?php

use App\Http\Controllers\InicioController;
use App\Http\Controllers\CategoriaDeProductosController;
use App\Http\Controllers\ProductosController;
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

Route::get('/', [InicioController::class, 'index'])->name('inicio.index');



Route::get('/categorias', [CategoriaDeProductosController::class, 'index'])->name('categorias.index');
Route::get('/categorias/create', [CategoriaDeProductosController::class, 'create'])->name('categorias.create');
Route::post('/categorias', [CategoriaDeProductosController::class, 'store'])->name('categorias.store');
Route::get('/categorias/{id}', [CategoriaDeProductosController::class, 'edit'])->name('categorias.edit');
Route::put('/categorias/{id}', [CategoriaDeProductosController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaDeProductosController::class, 'destroy'])->name('categorias.destroy');

Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}', [ProductosController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{id}', [ProductosController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [ProductosController::class, 'destroy'])->name('productos.destroy');

