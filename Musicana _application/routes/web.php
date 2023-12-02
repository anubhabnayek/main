<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\SongcategorieController;
use App\Http\Controllers\songController;
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
Route::get('/',[userController::class,'index']);
Route::get('/about', function () {
    return view('website/about');
});

Route::get('/signup',[userController::class,'create']);
Route::post('/signup',[userController::class,'store']);

Route::get('/contact',[contactController::class,'create']);
Route::post('/contact',[contactController::class,'store']);

Route::get('/signin',[userController::class,'login']);
Route::post('/login_auth',[userController::class,'login_auth']);


    



Route::get('/single-blog', function () {
    return view('website/single-blog');
});

Route::get('/songCategory',[SongcategorieController::class,'viewSongCategory']);
//===================================================================================//

Route::get('/admin_login',[adminController::class,'login']);
Route::post('/alogin_auth',[adminController::class,'adminlogin_auth']);
Route::get('/admin_logout',[adminController::class,'logout']);

Route::get('/admin_dashboard',[adminController::class,'index']);

Route::get('/add_songCategory',[SongcategorieController::class,'create']);
Route::post('/add_songCategory',[SongcategorieController::class,'store']);
Route::get('/manage_songCategory',[SongcategorieController::class,'show']);
Route::get('/edit_songCategory/{id}',[SongcategorieController::class,'edit']);
Route::post('/update_songCategory/{id}',[SongcategorieController::class,'update']);

Route::get('/manage_songCategory/{id}',[SongcategorieController::class,'destroy']);

Route::get('/add_song',[songController::class,'create']);
Route::post('/add_song',[songController::class,'store']);
Route::get('/manage_song',[songController::class,'show']);
Route::get('/edit_song/{id}',[songController::class,'edit']);
Route::post('/update_song/{id}',[songController::class,'update']);

Route::get('/manage_song/{id}',[songController::class,'destroy']);
   


Route::get('/manage_user',[userController::class,'show']); 
Route::get('/manage_user/{id}',[userController::class,'destroy']);
Route::get('/status/{id}',[userController::class,'status']); 
 


