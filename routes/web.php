<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;

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
    return view('dashboard');
});

Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
Route::post('/client/update/{id?}', [ClientController::class, 'update'])->name('client.update');
Route::post('/client/destroy/{id?}', [ClientController::class, 'destroy'])->name('client.destroy');
// Route::resource("client", ClientController::class);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth.auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('client', ClientController::class);
});