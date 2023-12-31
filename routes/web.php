<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportcardController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth','isverified')->group(function(){
    Route::view('/','home')->name('home');

    Route::get('/logout',[AuthController::class,'logout'])->name('user.logout');

    Route::resource('/users',UserController::class)->middleware('checkpermissions');
    Route::resource('/signs',SignController::class)->middleware('checkpermissions');
    
    Route::middleware('checkpermissions')->group(function(){
        Route::get('/reportcards',[ReportcardController::class,'index'])->name('reportcards.index');
        Route::get('/reportcards/{place}/uploadmarks/{type}',[ReportcardController::class,'uploadmarks'])->name('reportcards.uploadmarks');
        Route::post('/reportcards/{place}/uploadmarks/{type}',[ReportcardController::class,'marks'])->name('reportcards.uploadmarks');
        Route::get('/reportcards/examples/{type}',[ReportcardController::class,'downloadExample'])->name('example');
    });
});

Route::view('/login','auth.login')->name('login');
Route::post('/login',[AuthController::class,'login'])->name('user.login');

Route::view('/register','auth.register')->name('register');
Route::post('/register',[AuthController::class,'register'])->name('user.register');

Route::get('/verify/{token}',[AuthController::class,'UserVerification'])->name('verify');