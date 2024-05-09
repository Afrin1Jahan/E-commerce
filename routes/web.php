<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Backend\HomeController ;
use PharIo\Manifest\AuthorCollection;

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

Route::get('/',[FrontendController::class,'index'])->name('frontend.home');
Route::get('/contact-us',[FrontendController::class,'contact'])->name('user.contact');


Route::get('/login', [AuthController::class,'login'])->name('customer.login');
Route::post('/login', [AuthController::class,'doLogin'])->name('customer.do.login');
Route::get('/register',[AuthController::class,'registerform'])->name('register');
Route::post('/register',[AuthController::class,'processregister']);

// Route::get('/sendOtp', [AuthController::class,'sendOtp'])->name('sendOtp');
Route::get('/verify-Otp',[AuthController::class,'showOtpVerificationForm'])->name('showOtp.VerificationForm');
Route::post('/verify-Otp', [AuthController::class, 'verifyOtp'])->name('verifyOtp');
Route::get('/home',[HomeController::class,'home'])->name('admin.home'); 


