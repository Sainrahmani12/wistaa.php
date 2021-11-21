<?php

use App\Http\Controllers\WEB\DoaController;
use Facade\FlareClient\Api;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DoaController::class,'doa'])->name('doa');
Route::get('/post-data', [DoaController::class,'postData'])->name('post');
Route::post('/posting', [DoaController::class,'posting'])->name('posting');
Route::get('/post-kategori', [DoaController::class,'postKategori'])->name('post-kategori');
Route::post('/kategori', [DoaController::class,'nambahKategori'])->name('kategori');
Route::get('/post-wisata', [DoaController::class,'wisata'])->name('post-wisata');
Route::get('/login', [DoaController::class, 'login'])->name('login');
Route::post('/post-login', [DoaController::class, 'postingan'])->name('post-login');
Route::post('/api', [Api::class, 'api'])->name('api');