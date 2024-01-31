<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login',[CustomAuthController::class,'login'])->name('login');
Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');
Route::post('/logout',[CustomAuthController::class,'logout'])->name('logout');


Route::get('/adminDashboard',[CustomAuthController::class,'adminDashboard'])->name('adminDashboard');

Route::get('/admindashboardAttendance',[AttendanceController::class,'showTable'])->name('admindashboardAttendance');
Route::get('/fetch-and-save', [AttendanceController::class, 'fetchDataAndSave']);



Route::get('/admindashboardPayslipSalary',[PayslipController::class,'showTable'])->name('admindashboardPayslipSalary');
Route::get('/admindashboardPayslip/fetch', [PayslipController::class, 'fetchDataAndSave'])->name('fetchdata');
Route::get('/employee/{EmpID}', [PayslipController::class, 'getEmployeeDataByEmpId']);


Route::get('/admindashboardPayroll',[PayrollController::class,'showTable'])->name('admindashboardPayroll');


Route::get('/userDashboardPayslip',[UserController::class,'userDashboardPayslip'])->name('userDashboardPayslip');
Route::get('/userDashboardPayrollHistory',[UserController::class,'userDashboardPayrollHistory'])->name('userDashboardPayrollHistory');