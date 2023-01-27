<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\Auth\ForgotPasswordController;
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
//     return view('welcome');
// });
Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('/dashboard-admin', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard-admin');
    Route::get('/daftar-user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('daftar-user');
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register');
    Route::post('/dashboard-admin/store', [App\Http\Controllers\Admin\DashboardController::class, 'store'])->name('dashboard-admin-store');
});
Route::group(['middleware' => ['auth', 'employee']], function() {
    Route::get('/dashboard-employee', [App\Http\Controllers\Employee\DashboardController::class, 'index'])->name('dashboard-employee');
});



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
