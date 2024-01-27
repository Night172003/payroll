<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userdashboardPayslip()
    {
        return view("user-module.userdashboardPayslip");
    }

    
    public function  userdashboardPayrollHistory() 
    { 
        return view("user-module.userdashboardPayrollHistory"); 
     } 
}
