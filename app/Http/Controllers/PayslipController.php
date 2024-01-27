<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\AdminEmpPayslip;

class PayslipController extends Controller
{

    public function adminDashboardPayslip()
    {
        return view("admin-module.admindashboardPayslip");
    }

    public function showTable()
    {
        // Retrieve data from the AdminEmpPayslip model
        $payslipData = AdminEmpPayslip::all();  // Adjust the query based on your needs

        return view('admin-module.admindashboardPayslip', compact('payslipData'));
    }

    public function fetchDataAndSave()
    {
        // Make API request
        $response = Http::get('http://127.0.0.1:8080/api/EmpPayslip/info');
        $apiData = $response->json();
    
        // Save data to database
        foreach ($apiData['allEmployeePaySlips'] as $data) {
            \App\Models\AdminEmpPayslip::updateOrCreate(
                ['id' => $data['id']], // Assuming 'id' is a unique identifier
                [
                    'EmpID' => $data['EmpID'],
                    'FirstName' => $data['FirstName'],
                    'MiddleName' => $data['MiddleName'],
                    'LastName' => $data['LastName'],
                    'JobName' => $data['JobName'],
                    'EmpType' => $data['EmpType'],
                    'Date' => $data['Date'],
                    'PunchIn' => $data['PunchIn'],
                    'PunchOut' => $data['PunchOut'],
                ]
            );
        }
    
        return response()->json(['message' => 'Data fetched from API and saved to the database.']);

    }
    
    public function getEmployeeDataByEmpId($empId)
    {
        // Retrieve employee data based on EmpID
        $employeeData = AdminEmpPayslip::where('EmpID', $empId)->first();

        if ($employeeData) {
            return response()->json($employeeData);
        } else {
            return response()->json(['error' => 'Employee not found'], 404);
        }
    }

}
        
        



