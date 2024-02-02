<?php

namespace App\Http\Controllers\api;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use App\Models\AdminEmpPayslip;

use Session;



class CustomAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginUser(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Make a request to the authentication API to get credentials
    $responseCredentials = Http::get('http://127.0.0.1:8001/api/get-credentials', [
        'email' => $request->email,
        'password' => $request->password,
    ]);

    // Check the response from the API
    if ($responseCredentials->successful()) {
        // Assuming the API response contains an array of user records
        $userDataArray = $responseCredentials->json();

        // Find the user with the logged-in email
        $loggedInUser = collect($userDataArray)->firstWhere('email', $request->email);

        // Check if a user is found
        if ($loggedInUser) {
            // Check if the password matches using password_verify
            if (password_verify($request->password, $loggedInUser['password'])) {
                // Retrieve additional employee details from the database
                $employeeDetails = AdminEmpPayslip::where('CredID', $loggedInUser['CredID'])->first();

                // Store employeeDetails in the session
                session(['employeeDetails' => $employeeDetails]);

                // Check if 'is_admin' is equal to 1
                if ($loggedInUser["isAdmin"] === 1) {
                    // Redirect to admin dashboard
                    return redirect()->route('adminDashboard'); // Change 'adminDashboard' to your actual admin dashboard route name
                } else {
                    // Redirect to user dashboard
                    return view('user-module.userDashboardPayslip', ['employeeDetails' => $employeeDetails]);
                }
            } else {
                // Display pop-up for invalid credentials using JavaScript
                return redirect()->route('login')->with('error', 'Invalid credentials')->with('showPopup', true);
            }
        } else {
            // Display pop-up for invalid credentials using JavaScript
            return redirect()->route('login')->with('error', 'Invalid credentials')->with('showPopup', true);
        }
    } else {
        // Handle the case when the API response is not successful
        $errorMessage = $responseCredentials->json('error_message', 'Invalid credentials');
        // Display pop-up for invalid credentials using JavaScript
        return redirect()->route('login')->with('error', $errorMessage)->with('showPopup', true);
    }
}


    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function adminDashboard()
    {
        return view("admin-module.admindashboard");
    }

    public function userDashboardPayslip()
    {
        return view("user-module.userdashboardPayslip");
    }
}