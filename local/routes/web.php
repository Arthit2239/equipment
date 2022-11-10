<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\OderController;
use App\Http\Controllers\HomeController;
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
Auth::routes();

Route::get('/', [HomeController::class, 'login']);
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

// -----------------------------Register Password------------------------------
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register', [RegisterController::class, 'storeUser'])->name('storeUser');

// -----------------------------Forget Password------------------------------
Route::get('forget-password', [ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget-password');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('reset-password');
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('reset-password');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth:member');

Route::view('/home','home');

Route::resource('profile', ProfileController::class);

Route::resource('equipment', EquipmentController::class);
Route::get('/equipment/{id}/copy', [EquipmentController::class,'copy'])->name('equipment.copy');
Route::post('equipment/updatearray',  [EquipmentController::class,'updatearray'])->name('equipment.updatearray');
Route::get('equipment/{id}/modal',  [EquipmentController::class,'getmodal'])->name('equipment.modal');
Route::post('equipment/savemodal',  [EquipmentController::class,'savemodal'])->name('equipment.savemodal');

Route::resource('oder', OderController::class);
Route::get('/oder/{id}/copy', [OderController::class,'copy'])->name('oder.copy');
Route::post('oder/updatearray',  [OderController::class,'updatearray'])->name('oder.updatearray');
Route::get('oder/{id}/modal',  [OderController::class,'getmodal'])->name('oder.modal');
Route::post('oder/savemodal',  [OderController::class,'savemodal'])->name('oder.savemodal');

Route::resource('report', OderController::class);
Route::get('/report/{id}/copy', [OderController::class,'copy'])->name('report.copy');
Route::post('report/updatearray',  [OderController::class,'updatearray'])->name('report.updatearray');
Route::get('report/{id}/modal',  [OderController::class,'getmodal'])->name('report.modal');
Route::post('report/savemodal',  [OderController::class,'savemodal'])->name('report.savemodal');

