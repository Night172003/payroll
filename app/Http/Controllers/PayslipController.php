<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;


class PayslipController extends Controller
{

    public function adminDashboardPayslip()
    {
        return view("admin-module.admindashboardPayslip");
    }

    public function showTable()
    {
        // Make a request to the API endpoint
        $response = Http::get('http://127.0.0.1:8080/api/payslip/info');

        // Check if the API request is successful
        if ($response->successful()) {
            // Extract the data from the API response and save it into an array
            $payslipData = [];
            $payslipData = $response->json();

             // Paginate the data
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 5;
            $currentItems = array_slice($payslipData, ($currentPage - 1) * $perPage, $perPage);
            $payslipData = new LengthAwarePaginator($currentItems, count($payslipData), $perPage);

            return view('admin-module.admindashboardPayslip',compact('payslipData'));
            }

            
    }
}