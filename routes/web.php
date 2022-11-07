<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\UserEmployeeController;
use App\Http\Controllers\UserCompanyController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\CategoryDashboardController;
use App\Http\Controllers\IndustryDashboardController;
use App\Http\Controllers\ProvinceDashboardController;
use App\Http\Controllers\CityDashboardController;
use App\Http\Controllers\VillageDashboardController;
use App\Http\Controllers\DistrictDashboardController;
use App\Http\Controllers\Controller;



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

Route::get('test', function(){
    return view('card');
});
Route::get('contact', function(){
    return view('contact');
});

Route::get('try', function(){
    return view('test');
});

Route::get('dashboard/company', function(){
    return view('company.index');
});

Route::middleware(['auth', 'role:ADMIN'])->group(function () {
    Route::get('dashboard/admin', [UserAdminController::class, 'dashboardadmin'])->name('ADMIN')->middleware('isAdmin');
    Route::resource('/dashboard/user', UserDashboardController::class);
    Route::resource('/dashboard/category', CategoryDashboardController::class);
    Route::resource('/dashboard/industry', IndustryDashboardController::class);
    Route::resource('/dashboard/province', ProvinceDashboardController::class);
    Route::resource('/dashboard/city', CityDashboardController::class);
    Route::resource('/dashboard/village', VillageDashboardController::class);
    Route::resource('/dashboard/district', DistrictDashboardController::class);

    //semua route dalam grup ini hanya bisa diakses oleh ADMIN
});

Route::middleware(['auth', 'role:EMPLOYEE'])->group(function () {
    Route::get('dashboard/member', [UserEmployeeController::class, 'dashboardmember'])->name('EMPLOYEE');

    //semua route dalam grup ini hanya bisa diakses oleh EMPLOYEE
});


Route::middleware(['auth', 'role:COMPANY'])->group(function () {
    Route::get('dashboard/company', [UserCompanyController::class, 'dashboardcompany'])->name('COMPANY');

    //semua route dalam grup ini hanya bisa diakses oleh COMPANY
});



Route::get('signin', [Controller::class, 'login'])->name('login')->middleware('guest');
Route::post('logout', [UserAdminController::class,'logout']);

Route::resource('signup/company', UserCompanyController::class);
Route::get('signin/company', [UserCompanyController::class, 'login'])->name('login')->middleware('guest');
Route::post('signin/company', [UserCompanyController::class, 'authenticate']);

Route::resource('signup/employee', UserEmployeeController::class);
Route::get('signin/employee', [UserEmployeeController::class, 'login'])->name('login')->middleware('guest');
Route::post('signin/employee', [UserEmployeeController::class, 'authenticate']);

Route::resource('admin/regist', UserAdminController::class);
Route::get('admin/masuk', [UserAdminController::class, 'login'])->name('login')->middleware('guest');
Route::post('admin/masuk', [UserAdminController::class, 'authenticate']);
