<?php

use App\Http\Controllers\InscricaoController;
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
})->name('welcome');

Route::get('/dashboard',[InscricaoController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

//Adm
Route::get('/listaadm',[InscricaoController::class,'listaadm'])->middleware(['auth'])->name('listaadm');
Route::get('/listaarquivoadm/{id}',[InscricaoController::class,'listaarquivoadm'])->middleware(['auth'])->name('listaarquivoadm');

Route::post('/storearquivo', [InscricaoController::class, 'storearquivo'])->middleware(['auth'])->name('storearquivo');
Route::get('/atualiza',[InscricaoController::class,'atualiza'])->middleware(['auth'])->name('atualiza');
Route::get('/download/{id}',[InscricaoController::class,'download'])->middleware(['auth'])->name('download');



Route::put('/put',[InscricaoController::class,'put'])->middleware(['auth'])->name('put');
Route::get('/guia', [InscricaoController::class, 'guia'])->middleware(['auth'])->name('guia');
Route::get('/pdf', [InscricaoController::class, 'pdf'])->middleware(['auth'])->name('pdf');

Route::get('/lista', [InscricaoController::class, 'lista'])->middleware(['auth'])->name('lista');
Route::get('/excluirarquivo/{id}', [InscricaoController::class, 'excluirarquivo'])->middleware(['auth'])->name('excluirarquivo');

Route::post('/storenotas/{id}', [InscricaoController::class, 'storenotas'])->middleware(['auth'])->name('storenotas');