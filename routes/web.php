<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login',[CustomAuthController::class,'login'])->name('login');
Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::post('/logout',[CustomAuthController::class,'logout'])->name('logout');


Route::get('/adminDashboard',[CustomAuthController::class,'adminDashboard'])->name('adminDashboard');
Route::get('/userDashboard',[CustomAuthController::class,'userDashboard'])->name('userDashboard');

Route::get('/admindashboardAttendance',[AdminController::class,'admindashboardAttendance'])->name('admindashboardAttendance');
Route::get('/admindashboardEmployees',[AdminController::class,'admindashboardEmployees'])->name('admindashboardEmployees');
Route::get('/admindashboardPayroll',[AdminController::class,'admindashboardPayroll'])->name('admindashboardPayroll');

Route::get('/fetch-employees', [CustomAuthController::class, 'fetchEmployees']);
