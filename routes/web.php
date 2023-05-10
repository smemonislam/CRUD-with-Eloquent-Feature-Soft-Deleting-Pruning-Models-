<?php

use App\Http\Controllers\UserController;
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

Route::resource('users', UserController::class)->except(['show']);
Route::get('/trashed', [UserController::class, 'trashed'])->name('user-trashed');
Route::get('/restore/{id}', [UserController::class, 'restore'])->name('user-restore');
Route::delete('/permanent-delete/{id}', [UserController::class, 'permanentlyDelete'])->name('user-delete');
