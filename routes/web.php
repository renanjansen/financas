<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FonteDeRecursoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalarioController;
use App\Http\Controllers\OutrasFontesController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/fonte_de_recurso', [FonteDeRecursoController::class, 'index'])->name('fonte_de_recurso');
Route::get('/salario',[SalarioController::class, 'index'])->name('salario');
Route::get('/outras_fontes',[OutrasFontesController::class, 'index'])->name('outras_fontes');
Route::post('/fonte_de_recurso', [FonteDeRecursoController::class, 'cadastrarFonte'])->name('cadastrarFonte');
Route::post('/salario', [SalarioController::class, 'cadastrarSalarios'])->name('cadastrarSalarios');
Route::post('/outras_fontes',[OutrasFontesController::class, 'cadastrarOutrasFontes'])->name('cadastrarOutrasFontes');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
