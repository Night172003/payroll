<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\AdminEmpPayslip;


class AttendanceController extends Controller
{

    public function adminDashboardAttendance()
    {
        return view("admin-module.admindashboardAttendance");
    }

    public function showTable(Request $request)
    {
        try {
            // Make API request
            $response = Http::get('http://127.0.0.1:8001/api/get-employee-data');
            $apiData = $response->json();

            // Assuming the API response contains an array of employees
            $employees = $apiData['employees'] ?? [];

            return view('admin-module.admindashboardAttendance', compact('employees'));
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error in showTable function: ' . $e->getMessage());

            // Return a response with an error message
            return back()->with('error', 'An error occurred while fetching attendance data. Please try again.');
        }
    }

}
