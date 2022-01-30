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


use App\Http\Controllers\ClientController;
Route::resource('/clients', ClientController::class);
Route::get('/clients/{id}/confirmDelete',  [\App\Http\Controllers\ClientController::class, 'confirmDelete']);
Route::get('/clients/{id}/confirmSendEmail',  [\App\Http\Controllers\ClientController::class, 'confirmSendEmail']);
Route::post('/clients/{id}/sendEmail',  [\App\Http\Controllers\ClientController::class, 'sendEmail']);


Route::get('/clients/{client}/loans/create',  [\App\Http\Controllers\LoanController::class, 'create']);
Route::post('/clients/{client}/loans',  [\App\Http\Controllers\LoanController::class, 'store']);

Route::get('/clients/{client}/loans/{loan}/loanInstallments/create',  [\App\Http\Controllers\LoanInstallmentController::class, 'create']);
Route::get('/clients/{client}/loans/{loan}/loanInstallments/generateInstallments',  [\App\Http\Controllers\LoanInstallmentController::class, 'generateInstallments']);
Route::get('/clients/{client}/loans/{loan}/loanInstallments/update',  [\App\Http\Controllers\LoanInstallmentController::class, 'update']);

Route::get('/clients/calculator',  [\App\Http\Controllers\CalculatorController::class, 'index']);
Route::post('/clients/calculator',  [\App\Http\Controllers\CalculatorController::class, 'calculate']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\UserClientcontroller;
Route::resource('/myLoan', UserClientcontroller::class);

Route::get('/myLoan/{id}/show', [\App\Http\Controllers\UserClientcontroller::class, 'show']);

Route::get('/print', [\App\Http\Controllers\PrintController::class, 'print']);