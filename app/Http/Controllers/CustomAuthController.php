<?php

namespace App\Http\Controllers\api;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\AdminAttendanceController;
use Illuminate\Support\Facades\Http;

use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }


/*ieedit pa if llagyan ng hash if(Hash::check($request->password,$user->password)) to cover the pass in localhost*/
public function loginUser(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Make a request to your authentication API using get
    $response = Http::get('http://127.0.0.1:8080/api/employees/login', [
        'email' => $request->email,
        'password' => $request->password,
    ]);

    // Check the response from the API
    if ($response->successful()) {
        // Assuming the API response contains an array of user records
        $userDataArray = $response->json();

        // Find the user with the logged-in email
        $loggedInUser = collect($userDataArray)->firstWhere('email', $request->email);

        // Check if a user is found
        if ($loggedInUser) {
            // Check if 'is_admin' is equal to 1
            if ($loggedInUser["is_admin"] === 1) {
                // Redirect to admin dashboard
                return view("admin-module.admindashboard");
            } else {
                // Redirect to user dashboard
                return redirect()->route('userDashboard');
            }
        } else {
            // Handle the case when the logged-in user is not found in the response
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    } else {
        // Handle the case when the API response is not successful
        $errorMessage = $response->json('error_message', 'Invalid credentials');
        return redirect()->route('login')->with('error', $errorMessage);
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

    
public function userDashboard()
{
    return "Welcome to the user dashboard!";
}

}


