<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDashboardPayslip() {
        $employeeDetails = session('employeeDetails');
    
        // Check if $employeeDetails is not null or undefined
        if (!$employeeDetails) {
            // If it's not available in the session, you may need to fetch it again from the database or wherever it is stored
            $employeeDetails = AdminEmpPayslip::where('CredID', auth()->user()->CredID)->first();
    
            // Store it in the session again
            session(['employeeDetails' => $employeeDetails]);
        }
    
        return view('user-module.userDashboardPayslip', ['employeeDetails' => $employeeDetails]);
    }

    
    public function  userdashboardPayrollHistory() 
    { 
        return view("user-module.userdashboardPayrollHistory"); 
     } 
}
