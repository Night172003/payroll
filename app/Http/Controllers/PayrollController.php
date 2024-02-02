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
    try {
        // Make a request to the API endpoint
        $response = Http::get('http://127.0.0.1:8080/api/payroll/info');

        // Check if the API request is successful
        if ($response->successful()) {
            // Extract the data from the API response and save it into an array
            $payrollData = $response->json();

            // Check if there is any data available
            if (empty($payrollData)) {
                // If no data is available, return a message
                return view('admin-module.admindashboardPayroll')->with('message', 'No data available for payroll.');
            }

            // If there is data, pass it to the view
            return view('admin-module.admindashboardPayroll', compact('payrollData'));
        } else {
            // Handle the case where the API request is not successful
            return view('admin-module.admindashboardPayroll')->with('message', 'Failed to retrieve payroll data from the API.');
        }
    } catch (\Exception $e) {
        // Handle any exceptions or errors that occur during the API request
        return view('admin-module.admindashboardPayroll')->with('message', 'Error connecting to the API: ' . $e->getMessage());
    }
}
}

