<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    
    /* To Display Admin Dashboard */
    public function adminDashboard()
    {
        return view("admin-module.admindashboard");
    }

    /* To Display Attendance */
    public function adminDashboardAttendance() 
    { 
        return view("admin-module.admindashboardAttendance"); 
     } 

    /* To Display Employee */
    public function adminDashboardEmployees() 
     { 
         return view("admin-module.admindashboardEmployees"); 
      }  

     /* To Display Employee Payroll  */
    public function adminDashboardPayroll() 
    { 
        return view("admin-module.admindashboardPayroll"); 
     } 
}