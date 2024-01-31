<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\AdminEmpPayslip;
use App\Models\EmployeeAttendance;


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
    
                // Save data to the EmployeeAttendance model
                $this->saveDataToEmployeeAttendance($apiData);
    
                return view('admin-module.admindashboardAttendance', compact('employees'));
            } catch (\Exception $e) {
                // Log the error
                \Log::error('Error in showTableAndSave function: ' . $e->getMessage());
    
                // Return a response with an error message
                return back()->with('error', 'An error occurred while fetching attendance data. Please try again.');
            }
        }
    
        private function saveDataToEmployeeAttendance($apiData)
        {
            // Check if the 'employees' key exists in the API response
            if (isset($apiData['employees'])) {
                foreach ($apiData['employees'] as $employeeData) {
                    foreach ($employeeData['employee_attendance'] as $attendanceData) {
                        $existingRecord = EmployeeAttendance::where('emp_id', $employeeData['EmpID'])
                            ->where('date', $attendanceData['Date'])
                            ->first();
        
                        // If there is no existing record for the same emp_id and date, create a new one
                        if (!$existingRecord) {
                            EmployeeAttendance::create([
                                'emp_id' => $employeeData['EmpID'],
                                'date' => $attendanceData['Date'],
                                'punch_in' => $attendanceData['PunchIn'],
                                'punch_out' => $attendanceData['PunchOut'],
                                // Add other employee information as needed
                            ]);
                        } else {
                            // If an existing record is found, update the punch_out field
                            $existingRecord->update([
                                'punch_out' => $attendanceData['PunchOut'],
                            ]);
                        }
                    }
                }
            }
        }
    public function getPresentDays($empId)
    {
        // Add your logic to calculate and return present days based on the employee ID
        $presentDays = EmployeeAttendance::where('emp_id', $empId)
            ->whereNotNull('punch_in')
            ->whereNotNull('punch_out')
            ->count();

        return response()->json(['present_days' => $presentDays]);
    }
}

