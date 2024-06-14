<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AddOnController;
use App\Http\Controllers\AuditorController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\DocumentController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SalesmanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddZoneController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
// ========================================= ================login auth start ==============================================================
Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();
// ========================================= ================login auth end ==============================================================

// ========================================= ================home start ==============================================================
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
Route::post('/profile', [ProfileController::class, 'store'])->name('user.profile.store');
// ========================================= ================home start ==============================================================

// ========================================= ===============Roles and Permissions start ==============================================
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});
// ========================================= ===============Roles and Permissions end ==============================================
Route::get('/getproject/{id}',[ProductController::class,'getProject']);
// Route::post('/product/update/{id}',[ProductController::class,'update'])->name('products.update');

// ========================================= ===============Add Project start==============================================

Route::get('/project',[ProjectController::class,'index'])->name('project');
Route::get('/project/create',[ProjectController::class,'create'])->name('project.create');
Route::post('/project/store',[ProjectController::class,'store'])->name('project.store');
Route::get('/project/edit/{id}',[ProjectController::class,'edit'])->name('project.edit');
Route::post('/project/update/{id}',[ProjectController::class,'update'])->name('project.update');
Route::get('/project/delete/{id}',[ProjectController::class,'destroy']);

// ========================================= ===============Add Project End==============================================

// ========================================= ===============Add-On start==============================================
Route::get('/addOn',[AddOnController::class,'index'])->name('addOn');
Route::get('/addOn/create',[AddOnController::class,'create'])->name('addOn.create');
Route::post('/addOn/store',[AddOnController::class,'store'])->name('addOn.store');
Route::get('/addOn/edit/{id}',[AddOnController::class,'edit'])->name('addOn.edit');
Route::post('/addOn/edit/{id}',[AddOnController::class,'update'])->name('addOn.update');
Route::get('/addOn/delete/{id}',[AddOnController::class,'destroy']);
// ========================================= ===============Add-On End==============================================

// ========================================= ===============Add-Zone start==============================================
Route::get('/addZone',[AddZoneController::class,'index'])->name('addZone');
Route::get('/addZone/create',[AddZoneController::class,'create'])->name('addZone.create');
Route::post('/addZone/store',[AddZoneController::class,'store'])->name('addZone.store');
Route::get('/addZone/edit/{id}',[AddZoneController::class,'edit'])->name('addZone.edit');
Route::post('/addZone/edit/{id}',[AddZoneController::class,'update'])->name('addZone.update');
Route::get('/addZone/delete/{id}',[AddZoneController::class,'destroy']);

// ========================================= ===============Add-zone End==============================================


// ========================================= =============== Enquiry start  ========================================= ==============
Route::get('/enquiry-list',[EnquiryController::class,'index'])->name('enquiry.index');
Route::get('/add-enquiry',[EnquiryController::class,'create']);
Route::post('/store-enquiry',[EnquiryController::class,'store']);
Route::get('/edit-enquiry/{id}',[EnquiryController::class,'edit'])->name('enquiry.edit');
Route::post('/edit-enquiry/{id}',[EnquiryController::class,'update'])->name('enquiry.update');
Route::delete('/delete-enquiry/{id}',[EnquiryController::class,'destroy'])->name('enquiry.destroy');
// ========================================= =============== Enquiry End  ========================================= ==============

//========================================= =============== Salesman start ========================================= ===============
Route::get('/salesman',[SalesmanController::class,'index'])->name('salesman.index');
Route::get('/salesman/create/{id}',[SalesmanController::class,'create']);
Route::post('/store-salesman',[SalesmanController::class,'store']);
Route::get('/salesman/edit/{id}',[SalesmanController::class,'edit'])->name('salesman.edit');
Route::post('/salesman/update/{id}',[SalesmanController::class,'update'])->name('salesman.update');
Route::get('/get-data/{id}',[SalesmanController::class,'getData']);
Route::get('/salesman/delete/{id}',[SalesmanController::class,'destroy']);
Route::get('/fetchproject/{id}',[SalesmanController::class,'fetchProject']);
Route::get('/fetchaddon/{id}',[SalesmanController::class,'fetchAddon']);
Route::get('/gethouses/{id}',[SalesmanController::class,'getHouses']);
Route::get('/auditorData',[SalesmanController::class,'prientAuditor']);
//========================================= =============== Salesman End========================================= ===============

// ========================================= ===============auditor start ========================================= ===============
Route::get('/auditor',[AuditorController::class,'index'])->name('auditor.index');
Route::get('/auditor/print-form/{id}',[AuditorController::class,'printForm']);

// Route::get('/auditor/delete/{id}',[AuditorController::class,'destroy']);
// ========================================= ===============auditor End========================================= ===============

// ========================================= ===============Accountant start ========================================= ===============
Route::get('/accountant',[AccountController::class,'index'])->name('account.index');
Route::get('/accountant/downpayment/slip/{id}',[AccountController::class,'downPaymentSlip']);
Route::get('/accountant/generate/invoice/{id}',[AccountController::class,'generateInvoice']);
Route::get('/accountant/payment-installment/{id}',[AccountController::class,'paymentInstallment']);
Route::post('/accountant/payment-installment/{id}', [AccountController::class, 'paymentpost'])->name('payment.installment');

// ========================================= ===============Accountant End ========================================= ===============

// ========================================= ===============Bank start ========================================= ===============
Route::get('/bank',[BankController::class,'index'])->name('bank.index');
Route::get('/bank-payment-process/{id}',[BankController::class,'bankPaymentProcsess']);
Route::post('/bank-payment-process/{id}',[BankController::class,'bankPaid']);
Route::get('/product-list',[BankController::class,'productlistAjax']);
Route::post('/searchproduct',[BankController::class,'searchProduct']);

// ========================================= ===============Bank End ========================================= ===============

// ========================================= ===============Document start ========================================= ===============
Route::get('/docs-view',[DocumentController::class,'index'])->name('document.index');
Route::get('/docs/trash-list',[DocumentController::class,'trashList']);
Route::get('/fetch-data/{stage}', [DocumentController::class, 'fetchData'])->name('fetch-data');
Route::get('/trash-data/{stage}', [DocumentController::class, 'trashData'])->name('trash-data');
Route::get('/docs-add',[DocumentController::class,'docsAdd']);
Route::get('/stage-first',[DocumentController::class,'stageFirst']);
Route::post('/stage-first',[DocumentController::class,'storeStageFirst']);
Route::get('/stage-second',[DocumentController::class,'stageSecond']);
Route::post('/stage-second',[DocumentController::class,'storeStageMiddle']);
Route::get('/stage-third',[DocumentController::class,'stageThird']);
Route::post('/stage-third',[DocumentController::class,'finalStage']);
Route::get('/house-num/{id}', [DocumentController::class, 'getHouseNum']);
Route::get('/fetch-mid/{id}', [DocumentController::class, 'fetchMiddle']);
Route::get('/fetch-final/{id}', [DocumentController::class, 'fetchFinal']);
Route::get('/stage/first/edit/{role}/{id}', [DocumentController::class, 'restore']);
Route::get('/stage/first/delete/{id}', [DocumentController::class, 'destroy']);


// ========================================= ===============Document End ========================================= ===============


