<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\productController;
use App\Http\Controllers\forgotpasswordController;



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
Route::get('/',[customerController::class,'index']);
Route::get('/about',[customerController::class,'about']);
Route::get('products', function () {
    return view('website/products');
});
Route::get('faq', function () {
    return view('website/faq');
});
 Route::get('/profile',[customerController::class,'profile'])->middleware('customerafterlogin');
 Route::get('/profile/{id}',[customerController::class,'edit'])->middleware('customerafterlogin');
 Route::post('/profile/{id}',[customerController::class,'update'])->middleware('customerafterlogin');
 Route::get('contact',[contactController::class,'create']);
 Route::post('contact',[contactController::class,'store']);


 

    //
    
//});

  //Route::get('signin', function () {
  //return view('website/signin');
    
  //});
    // Route::get('signup', function () {
    // return view('website/signup');
    
 //});
Route::get('/signup',[customerController::class,'create'])->middleware('customerbeforelogin');
Route::post('/signup',[customerController::class,'store'])->middleware('customerbeforelogin');


Route::get('/signin',[customerController::class,'login'])->middleware('customerbeforelogin');
Route::post('/login_auth',[customerController::class,'login_auth'])->middleware('customerbeforelogin');
Route::get('/userlogout',[customerController::class,'logout'])->middleware('customerafterlogin');  
Route::get('forgot',[forgotpasswordController::class,'index']);
Route::post('/forgot_pass',[forgotpasswordController::class,'forgot_pass']);
Route::post('/otp_match',[forgotpasswordController::class,'otp_match']);
Route::post('/reset_pass',[forgotpasswordController::class,'reset_pass']);


Route::get('otp', function () {
 return view('website/otp');
});
Route::get('reset', function () {
 return view('website/reset');
});
   
    


   
Route::get('product-detail', function () {
    return view('website/product-detail');
});

//===========================================================================================================//

Route::group(['middleware'=>['adminbeforelogin']],function(){

Route::get('/admin-login',[adminController::class,'index']);
Route::post('/alogin_auth',[adminController::class,'login_auth']);
});

Route::group(['middleware'=>['adminafterlogin']],function(){

Route::get('/adminlogout',[adminController::class,'logout']);

Route::get('admin_dashboard', function() {
    return view('admin/dashboard');
});
Route::get('add_cate', function () {
    return view('admin/add_cate');
});
Route::get('manage_cate', function() {
    return view('admin/manage_cate');
});
Route::get('/add_prod',[productController::class,'create']); 
Route::post('/add_prod',[productController::class,'store']); 

Route::get('/manage_prod',[productController::class,'show']); 


Route::get('/manage_prod/{id}',[productController::class,'destroy']); 
Route::get('/editprod/{id}',[productController::class,'edit']);
Route::post('/updateprod/{id}',[productController::class,'update']);     

// Route::get('manage_cust', function() {
//     return view('admin/manage_cust');
// });
Route::get('/manage_cust',[customerController::class,'show']);


Route::get('/manage_cust/{id}',[customerController::class,'destroy']);



Route::get('/status/{id}',[customerController::class,'status']);

Route::get('add_emp', function() {
    return view('admin/add_emp');
});
Route::get('manage_emp', function() {
    return view('admin/manage_emp');
});
Route::get('/manage_feedback',[contactController::class,'show']);
Route::get('/manage_feedback/{id}',[contactController::class,'destroy']);

Route::get('index', function () {
    return view('admin/index');
});
});