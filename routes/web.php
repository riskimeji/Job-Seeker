<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\UserEmployeeController;
use App\Http\Controllers\UserCompanyController;
use App\Http\Controllers\BioEmployeeController;
use App\Http\Controllers\BioCompanyController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\EditJobController;
use App\Http\Controllers\EditEducationController;
use App\Http\Controllers\EditAddressController;
use App\Http\Controllers\CategoryDashboardController;
use App\Http\Controllers\IndustryDashboardController;
use App\Http\Controllers\ProvinceDashboardController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CityDashboardController;
use App\Http\Controllers\VillageDashboardController;
use App\Http\Controllers\LowonganCompanyController;
use App\Http\Controllers\JenjangPendidikanController;
use App\Http\Controllers\DistrictDashboardController;
use App\Http\Controllers\JurusanPendidikanController;
use App\Http\Controllers\PersonalInfoController;
use App\Http\Controllers\HariKerjaController;
use App\Http\Controllers\JamKerjaController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\CompanyInformationController;
use App\Http\Controllers\EditCompanyInformationController;
use App\Http\Controllers\MinimalPengalamanController;
use App\Http\Controllers\JenjangKarirController;
use App\Http\Controllers\LamaranCompanyController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Detail;
use App\Http\Controllers\Testing;



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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [Controller::class,'lowongan'])->name('lowongan');
Route::get('/cari', [Controller::class,'search'])->name('search');

Route::get('/lowongan', [Controller::class,'pagelowongan'])->name('pagelowongan');
Route::post('/ajukan/{lowongan}', [Controller::class,'ajukan'])->name('ajukan');
// Route::resource('/detail', Detail::class)->parameters([
//     'detail' => 'lowongan:slug']);
Route::resource('/detail', LowonganController::class)->parameters([
    'detail' => 'lowongan:slug'
]);
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
    Route::resource('/dashboard/hari-kerja', HariKerjaController::class);
    Route::resource('/dashboard/jam-kerja', JamKerjaController::class);
    Route::resource('/dashboard/province', ProvinceDashboardController::class);
    Route::resource('/dashboard/city', CityDashboardController::class);
    Route::resource('/dashboard/village', VillageDashboardController::class);
    Route::resource('/dashboard/lamaran', LamaranController::class);

    Route::resource('/dashboard/lowongan', LowonganController::class);

    Route::resource('/dashboard/district', DistrictDashboardController::class);

    // Route::resource('/dashboard/lamaran', LowonganController::class)->parameters([
    //     'dashboard.lowongan' => 'lowongan:slug'
    // ]);

    Route::resource('/dashboard/jenjang-pendidikan', JenjangPendidikanController::class);
    Route::resource('/dashboard/jurusan-pendidikan', JurusanPendidikanController::class);
    Route::resource('/dashboard/jenjang-karir', JenjangKarirController::class);
    Route::resource('/dashboard/minimal-pengalaman', MinimalPengalamanController::class);
    // Route::resource('/dashboard/test', Testing::class);
    // Route::get('provinces', [Testing::class,'provinces'])->name('provinces');
    // Route::get('cities', [Testing::class,'cities'])->name('cities');
    // Route::get('districts', [Testing::class,'districts'])->name('districts');
    // Route::get('villages', [Testing::class,'villages'])->name('villages');

    //search lowongan di halaman admin
    Route::get('dashboard/search', [LowonganController::class,'search'])->name('search');

    //semua route dalam grup ini hanya bisa diakses oleh ADMIN
});

Route::middleware(['auth', 'role:EMPLOYEE'])->group(function () {
    // Route::get('/dashboard/profile', [BioEmployeeController::class,'profile'])->name('profile');
    Route::resource('/dashboard/profile', BioEmployeeController::class);
    Route::get('/dashboard/member', [UserEmployeeController::class, 'dashboardmember'])->name('EMPLOYEE');
    // Route::resource('/dashboard/personal-information', BioEmployeeController::class);
    Route::resource('/dashboard/account', AccountController::class);
    Route::resource('/dashboard/edit-education', EditEducationController::class);
    Route::resource('/dashboard/edit-jobexperience', EditJobController::class);
    Route::resource('/dashboard/edit-address', EditAddressController::class);
    Route::resource('/dashboard/personal-information', PersonalInfoController::class);
    Route::get('provinces', [PersonalInfoController::class,'provinces'])->name('provinces');
    Route::get('cities', [PersonalInfoController::class,'cities'])->name('cities');
    Route::get('districts', [PersonalInfoController::class,'districts'])->name('districts');
    Route::get('villages', [PersonalInfoController::class,'villages'])->name('villages');
    Route::post('/dashboard/personal-information', [PersonalInfoController::class,'store'])->name('personal-information.store');



    //semua route dalam grup ini hanya bisa diakses oleh EMPLOYEE
});


Route::middleware(['auth', 'role:COMPANY'])->group(function () {
    Route::get('dashboard/company', [UserCompanyController::class, 'dashboardcompany'])->name('COMPANY');
    Route::resource('dashboard/company/profile', BioCompanyController::class);
    Route::resource('/dashboard/company/lamaran', LamaranCompanyController::class);
    Route::resource('/dashboard/company-compleate', CompanyInformationController::class);
    Route::resource('/dashboard/company/lowongan', LowonganCompanyController::class);
    Route::get('provinces', [CompanyInformationController::class,'provinces'])->name('provinces');
    Route::get('cities', [CompanyInformationController::class,'cities'])->name('cities');
    Route::get('districts', [CompanyInformationController::class,'districts'])->name('districts');
    Route::get('villages', [CompanyInformationController::class,'villages'])->name('villages');
    Route::post('/dashboard/company-compleate', [CompanyInformationController::class,'store'])->name('company-compleate.store');

    Route::get('dashboard/company/search', [LowonganCompanyController::class,'search'])->name('search');


    //semua route dalam grup ini hanya bisa diakses oleh COMPANY
});


Route::resource('/dashboard/password', EditCompanyInformationController::class);
Route::get('signin', [Controller::class, 'login'])->name('login')->middleware('guest');
Route::post('logout', [UserAdminController::class,'logout']);

Route::resource('signup/company', UserCompanyController::class);
Route::get('signin/company', [UserCompanyController::class, 'login'])->name('login')->middleware('guest');
Route::post('signin/company', [UserCompanyController::class, 'authenticate']);

Route::resource('signup/employee', UserEmployeeController::class);
Route::get('signin/employee', [UserEmployeeController::class, 'login'])->name('login')->middleware('guest');
Route::post('signin/employee', [UserEmployeeController::class, 'authenticate']);

Route::resource('admin/regist', UserAdminController::class);
Route::get('admin/masuk', [UserAdminController::class, 'masuk'])->name('masuk')->middleware('guest');
Route::post('admin/masuk', [UserAdminController::class, 'authenticate']);
