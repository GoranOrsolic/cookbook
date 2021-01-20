<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/add', [App\Http\Controllers\ReceptiController::class, 'index']);

Route::get('/search', [App\Http\Controllers\ReceptiController::class, 'search'])->name('search');;

Route::post('/add', [App\Http\Controllers\ReceptiController::class, 'store'])->name('add');

Route::get('/recepti', [App\Http\Controllers\ReceptiController::class, 'edit'])->name('recepti');

Route::get('show/{id}', [App\Http\Controllers\ReceptiController::class, 'show'])->name('show');

Route::get('/edit/{id}', [App\Http\Controllers\UpdateController::class, 'index'])->name('edit');

Route::get('/edit/{id}', [App\Http\Controllers\UpdateController::class, 'edit']);

Route::post('/edit/{id}', [App\Http\Controllers\UpdateController::class, 'update'])->name('edit');

Route::delete('/add/destroy/{id}', [App\Http\Controllers\UpdateController::class, 'destroy'])->name('add.destroy');

//Route::post('/edit/{id}', [App\Http\Controllers\SastojciController::class, 'destroy'])->name('edit.destroy');

Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil');

Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'edit']);

Route::post('/profil', [App\Http\Controllers\ProfilController::class, 'update'])->name('profil');

Route::post('show/{id}', [App\Http\Controllers\CommentController::class, 'comment']);

