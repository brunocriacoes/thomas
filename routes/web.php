<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/pagamento/sucesso', function () {
    return view('pagamento.sucesso');
})->name('pagamento.sucesso');

Route::get('/pagamento/falha', function () {
    return view('pagamento.falha');
})->name('pagamento.falha');

Route::get('/pagamento/pendente', function () {
    return view('pagamento.pendente');
})->name('pagamento.pendente');