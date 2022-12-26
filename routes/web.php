<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\companyController;
use App\Http\Controllers\employeeController;

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
    return view('app');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Auth::routes();

Route::resource('company',companyController::class);
Route::resource('employee',employeeController::class);


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
