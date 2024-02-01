<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayslipController;
use App\Http\Controllers\AttendanceController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee/{EmpID}', [PayslipController::class, 'getEmployeeDataByEmpId']);

Route::get('/employee_attendance/{empId}/present-days', [AttendanceController::class, 'getPresentDays']);
Route::get('/employee_leave/{empId}', [AttendanceController::class, 'getLeaveData']);
