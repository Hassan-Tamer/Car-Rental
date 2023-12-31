<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer_controller;
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


Route::get('/View_customer',[Customer_controller::class,'view_tab']);
Route::get('/rent',[Customer_controller::class,'rent']);
Route::get('/rent/{car}',[Customer_controller::class, 'rentCar']);
Route::get('/view_trips',[Customer_controller::class,'view_trips']);
Route::get('/login_user', 'YourController@yourMethod')->name('login_user');

