<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class PayrollController extends Controller
{
    public function adminDashboardPayroll()
    {
        return view("admin-module.admindashboardPayroll");
    }

    public function showTable()
    {
        // Make a request to the API endpoint
        $response = Http::get('http://127.0.0.1:8080/api/payroll/info');

        // Check if the API request is successful
        if ($response->successful()) {
            // Extract the data from the API response and save it into an array
            $payrollData = [];
            $payrollData = $response->json();

             // Paginate the data
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 5;
            $currentItems = array_slice($payrollData, ($currentPage - 1) * $perPage, $perPage);
            $payrollData = new LengthAwarePaginator($currentItems, count($payrollData), $perPage);

            return view('admin-module.admindashboardPayroll',compact('payrollData'));
        } 
    }
}

