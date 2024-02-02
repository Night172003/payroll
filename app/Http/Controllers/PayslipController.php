<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\AdminEmpPayslip;

use App\Models\Payslip;
use Carbon\Carbon;


class PayslipController extends Controller
{

    public function adminDashboardPayslip()
    {
        return view("admin-module.admindashboardPayslip");
    }

    public function showTable()
    {
        // Retrieve data from the AdminEmpPayslip model
        $adminEmpPayslips = AdminEmpPayslip::all();  // Adjust the query based on your needs

        return view('admin-module.admindashboardPayslipSalary', compact('adminEmpPayslips'));
    }

    public function fetchDataAndSave()
    {
        try {
            // Make API request
            $response = Http::get('http://127.0.0.1:8001/api/get-employee-data');
    
            // Check if the request was successful
            if ($response->successful()) {
                $apiData = $response->json();
    
                // Save data to database
                foreach ($apiData['employees'] as $employeeData) {
                    // Extracting relevant data from the JSON structure
                    $employee = $employeeData;
                    $job = $employeeData['job'];
                    $loginCredential = $employeeData['login_credential'];
                    $attendance = isset($employeeData['employee_attendance'][0]) ? $employeeData['employee_attendance'][0] : null;
                    $leave = isset($employeeData['leave'][0]) ? $employeeData['leave'][0] : null;
    
                    \App\Models\AdminEmpPayslip::updateOrCreate(
                        ['EmpID' => $employee['EmpID']], // Assuming 'EmpID' is a unique identifier
                        [
                            // Include other fields as needed
                            'EmpID' => $employee['EmpID'],
                            'CredID' => $employee['CredID'],
                            'JobID' => $employee['JobID'],
                            'LastName' => $employee['LastName'],
                            'FirstName' => $employee['FirstName'],
                            'MiddleName' => $employee['MiddleName'],
                            'Birthday' => $employee['Birthday'],
                            'Address' => $employee['Address'],
                            'PhoneNumber' => $employee['PhoneNumber'],
                            'EmpType' => $employee['EmpType'],
                            'JobName' => $job['JobName'],
                            'JobDescription' => $job['JobDescription'],
                            'Email' => $loginCredential['email'],
                            'PunchIn' => optional($attendance)['PunchIn'],
                            'PunchOut' => optional($attendance)['PunchOut'],
                            'StartDate' => optional($leave)['StartDate'],
                            'EndDate' => optional($leave)['EndDate'],
                            'Reason' => optional($leave)['Reason'],
                            'Status' => optional($leave)['Status'],
                        ]
                    );
                }
    
                return response()->json(['message' => 'Data fetched from API and saved to the database.']);
            } else {
                return response()->json(['error' => 'API request failed.'], 500);
            }
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error in fetchDataAndSave function: ' . $e->getMessage());
    
            // Return an error response
            return response()->json(['error' => 'An error occurred.'], 500);
        }
    }

    public function getEmployeeDataByEmpID($EmpID)
    {
        try {
            // Retrieve employee data based on EmpID
            $employeeData = AdminEmpPayslip::where('EmpID', $EmpID)->first();

            if (!$employeeData) {
                return response()->json(['error' => 'Employee not found for EmpID: ' . $EmpID], 404);
            }

            return response()->json(['data' => $employeeData]);
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Error in getEmployeeDataByEmpID function: ' . $e->getMessage());

            // Return a more detailed error response
            return response()->json(['error' => 'An error occurred. Check the logs for details.'], 500);
        }
    }

    public function savePayslip(Request $request)
    {
        // Validate the form data
        $request->validate([
            'emp_id' => 'required',
            'present_days' => 'required|numeric',
            'pay_period_start_date' => 'required|date',
            'pay_period_end_date' => 'required|date',
            'basic_salary' => 'required|numeric',
            'total_allowance' => 'required|numeric',
            'total_deduction' => 'required|numeric',
            'net_pay' => 'required|numeric',
            // Include other form fields validation as needed
        ]);

        // Check if the payslip with the provided ID exists
        $payslip = App\Models\Payslip::find($request->input('emp_id'));

        if ($payslip) {
            // If the payslip exists, update its data
            $payslip->update($request->all());
        } else {
            // If the payslip doesn't exist, create a new one
            App\Models\Payslip::create($request->all());
        }

        return response()->json(['message' => 'Payslip saved or updated successfully']);
    }

}
    

        
        



