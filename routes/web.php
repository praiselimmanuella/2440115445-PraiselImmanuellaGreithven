<?php

use App\Http\Controllers\HttpPostController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {return view('welcome');});
// Reading Data
Route::get('/list-umkm', [PostController::class, 'getListUMKM'])->name('list_umkm');


Route::post('/submit-form', [PostController::class, 'submitForm'])->name('submit_form');
Route::delete('/delete/umkm/{id}', [PostController::class, 'deleteUMKM'])->name('umkm_delete');
//
