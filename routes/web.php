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

Route::resource('clients', 'App\Http\Controllers\ClientsController');
Route::resource('jobs', 'App\Http\Controllers\JobsController');
Route::resource('controlpanel', 'App\Http\Controllers\ControlPanelController');
Route::resource('products', 'App\Http\Controllers\ProductsController');
Route::resource('invoice', 'App\Http\Controllers\InvoicesController');
Route::resource('expense', 'App\Http\Controllers\ExpensesController');
Route::resource('payment', 'App\Http\Controllers\PaymentsController');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tablet', [App\Http\Controllers\TabletController::class, 'index'])->name('tablet');

Auth::routes();
