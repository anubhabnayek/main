<?php
use App\Http\Controllers\userController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/',[userController::class,'show']);
Route::get('/index',[userController::class,'create']);
Route::post('/index',[userController::class,'store']);
Route::get('/display/{id}',[userController::class,'destroy']);
Route::get('/edit_data/{id}',[userController::class,'edit']); 
Route::post('/update_data/{id}',[userController::class,'update']);  