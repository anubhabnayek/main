<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\blogController;

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

Route::get('/signup',[userController::class,'create']);
Route::post('/signup',[userController::class,'store']);
Route::get('/signin',[userController::class,'login']);
Route::post('/login_auth',[userController::class,'login_auth']);
Route::get('/display/{id}',[userController::class,'destroy']);


Route::get('/display',[userController::class,'show']);
Route::get('/edit/{id}',[userController::class,'edit']);
Route::post('/update/{id}',[userController::class,'update']);

Route::get('/index',[blogController::class,'create']); 
Route::post('/index',[blogController::class,'store']);
Route::get('/blogdisplay',[blogController::class,'show']); 
Route::get('/blogdisplay/{id}',[blogController::class,'destroy']); 
Route::get('/editblog/{id}',[blogController::class,'edit']);
Route::post('/update/{id}',[blogController::class,'update']); 




    
     



