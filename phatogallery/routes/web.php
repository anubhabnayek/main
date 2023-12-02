<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\galleryController;
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
Route::get('/imageupload',[galleryController::class,'index']);
Route::post('/imageupload',[galleryController::class,'store']);
Route::get('/imageview',[galleryController::class,'show']);





Route::get('/', function () {
    return view('website/imageupload');
});


