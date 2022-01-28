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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

use App\Http\Controllers\ClientController;
Route::resource('/clients', ClientController::class);
Route::get('/clients/{id}/confirmDelete',  [\App\Http\Controllers\ClientController::class, 'confirmDelete']);

/* use App\Http\Controllers\ClientController;
Route::get('/expense_reports/{expense_report}/expenses/create', 'ExpenseController@create'); */