<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Roles;

class AuthController extends Controller
{
    // for login
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (auth()->user()->role_id == 1) {
                return redirect('dashboard')->with('success_message', 'Admin Login Successfully');
            } else if (auth()->user()->role_id == 2) {
                return view('theme.content');
            } else {
                return ('Invalid credentials');
            }
        }
        return redirect("login")->with('error_message', 'Invalid credentials');
    }

    // to registrate a new user
    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'userName' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        // $check = $this->create($data);

        return redirect("dashboard")->with('You have signed-in');
    }

    // to create a new user
    public function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'userName' => $data['userName'],
            'gender' => $data['gender'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password'])
        ]);
    }

    // For admin dashboard
    public function dashboard()
    {
        if (Auth::check()) {
            return view('theme.content-2');
        }
        return redirect("login");
    }

    // for logout
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login')->with('logout_message', 'Logout Successfully');
    }
}
