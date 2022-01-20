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
    return view('auth.login');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\PageController::class, 'tampil'])->name('home');

Route::get('/insertmakanan', [App\Http\Controllers\PageController::class, 'show_insert']);

Route::get('/updateprofile', [App\Http\Controllers\PageController::class, 'show_updateprof']);

Route::post('/updated_prof', [App\Http\Controllers\PageController::class, 'updateprof']);

Route::post('/inserted', [App\Http\Controllers\PageController::class, 'insert']);

Route::get('/kirim/{id}', [App\Http\Controllers\PageController::class, 'kirim']);

Route::get('/home/delete/{id}', [App\Http\Controllers\PageController::class, 'hapus']);

Route::get('/home/edit/{id}', [App\Http\Controllers\PageController::class, 'edit']);

Route::post('/home/edit/{id}', [App\Http\Controllers\PageController::class, 'update']);

Route::get('/order/{id}', [App\Http\Controllers\PageController::class, 'order']);

Route::get('/home/order', [App\Http\Controllers\PageController::class, 'makanan']);

Route::get('/auth/redirect', [App\Http\Controllers\Auth\LoginController::class,'redirectToProvider']);

Route::get('/auth/callback', [App\Http\Controllers\Auth\LoginController::class,'handleProviderCallback']);

Route::get('/tambah/{id}', [App\Http\Controllers\PageController::class, 'tambah']);

Route::get('/kurang/{id}', [App\Http\Controllers\PageController::class, 'kurang']);

Route::get('/listmakanan', [App\Http\Controllers\PageController::class, 'show_listmakanan']);

Route::get('/update_makanan/{id}', [App\Http\Controllers\PageController::class, 'show_updatemakanan']);

Route::get('/delete_makanan/{id}', [App\Http\Controllers\PageController::class, 'delete_makanan']);

Route::post('/updated', [App\Http\Controllers\PageController::class, 'update_makanan']);

Route::get('/productfound', [App\Http\Controllers\PageController::class, 'search']);





