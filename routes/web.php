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

Route::get('/employees', [App\Http\Controllers\employeeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('home');

Route::get('/employees/create', [App\Http\Controllers\employeeController::class, 'create'])->middleware('auth');

Route::post('/employees/create', [App\Http\Controllers\employeeController::class, 'store']);

Route::get('/employees/{employee}', [App\Http\Controllers\employeeController::class, 'show']);

Route::get('/employees/{employee}/edit', [App\Http\Controllers\employeeController::class, 'edit']);

Route::post('/employees/{employee}/edit', [App\Http\Controllers\employeeController::class, 'update']);

Route::get('/employees/{employee}/delete', [App\Http\Controllers\employeeController::class, 'delete']);

Route::get('/users/{user}', [App\Http\Controllers\userController::class, 'show']);

Route::get('/users/{user}/edit', [App\Http\Controllers\userController::class, 'edit']);

Route::post('/users/{user}/edit', [App\Http\Controllers\userController::class, 'update']);

Route::get('/users/{user}/delete', [App\Http\Controllers\userController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
