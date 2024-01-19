<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class AttendanceController extends Controller
{

    public function adminDashboardAttendance()
    {
        return view("admin-module.admindashboardAttendance");
    }

    public function showTable()
    {
        // Make a request to the API endpoint
        $response = Http::get('http://127.0.0.1:8080/api/attendance/info');

        // Check if the API request is successful
        if ($response->successful()) {
            // Extract the data from the API response and save it into an array
            $attendanceData = [];
            $attendanceData = $response->json();

             // Paginate the data
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $perPage = 5;
            $currentItems = array_slice($attendanceData, ($currentPage - 1) * $perPage, $perPage);
            $attendanceData = new LengthAwarePaginator($currentItems, count($attendanceData), $perPage);

            return view('admin-module.admindashboardAttendance',compact('attendanceData'));
            }

            
    }
}
