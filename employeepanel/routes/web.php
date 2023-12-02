<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('index', function () {
    return view('employee/index');
});

Route::get('add_cate', function () {
    return view('employee/add_cate');
});

Route::get('manage_cate', function () {
    return view('employee/manage_cate');
});

Route::get('add_prod', function () {
    return view('employee/add_prod');
});

Route::get('manage_prod', function () {
    return view('employee/manage_prod');
});
Route::get('manage_cust', function () {
    return view('employee/manage_cust');
});
Route::get('blank', function () {
    return view('employee/blank');
});
Route::get('login', function () {
    return view('employee/login');
});

