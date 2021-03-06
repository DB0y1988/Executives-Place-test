<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CurrencyController;

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

// Home route not being used
Route::get('/', function() {
	return view('/welcome');
});

Route::resource('/users', UserController::class);
Route::post('/currency/{user}', [CurrencyController::class, 'show']);
