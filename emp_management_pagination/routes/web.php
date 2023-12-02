<?php
use App\Http\Controllers\employeeController;
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

Route::get('index', function () {
    return view('employee/index');
});
Route::get('ui', function () {
    return view('employee/ui');
});
Route::get('/form',[employeeController::class,'create']);
Route::post('/form',[employeeController::class,'store']);

Route::get('chart', function () {
    return view('employee/chart');
});
Route::get('tab-panel', function () {
    return view('employee/tab-panel');
});
Route::get('/table',[employeeController::class,'show']);


Route::get('blank', function () {
    return view('employee/blank');
});

