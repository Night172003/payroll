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
            $attendanceData = AdminEmpPayslip::all();  // Adjust the query based on your needs

            return view('admin-module.admindashboardAttendance', compact('attendanceData'));
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error in showTable function: ' . $e->getMessage());

            // Return a response with an error message
            return back()->with('error', 'An error occurred while fetching attendance data. Please try again.');
        }
    }
}
