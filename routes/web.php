<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\UserEmployeeController;
use App\Http\Controllers\UserCompanyController;


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

Route::get('/', function () {
    return view('index');
});
Route::get('about', function () {
    return view('about');
});
Route::get('signup', function () {
    return view('signup.index');
});
Route::get('signup/company', function () {
    return view('signup.company');
});
Route::get('signin', function(){
    return view('signin.index');
});
Route::get('test', function(){
    return view('card');
});
Route::get('contact', function(){
    return view('contact');
});

Route::get('try', function(){
    return view('test');
});
Route::resource('signup/company', UserCompanyController::class);
Route::get('signin/company', [UserCompanyController::class, 'login'])->name('login')->middleware('guest');
Route::post('signin/company', [UserCompanyController::class, 'authenticate']);

Route::resource('signup/employee', UserEmployeeController::class);
Route::get('signin/employee', [UserEmployeeController::class, 'login'])->name('login')->middleware('guest');
Route::post('signin/employee', [UserEmployeeController::class, 'authenticate']);

Route::resource('admin/regist', UserAdminController::class);
Route::get('admin/login', [UserAdminController::class, 'login'])->name('login')->middleware('guest');
Route::post('admin/login', [UserAdminController::class, 'authenticate']);
