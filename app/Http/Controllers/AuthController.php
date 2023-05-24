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
                return redirect('dashboard');
            } else if (auth()->user()->role_id == 2) {
                return view('theme.content', ['name' => 'User']);
            } else {
                return 'alert("Login credentials is wrong")';
            }
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

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
            'gender' => 'rerequestquired',
            'phone_number' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

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

    public function dashboard()
    {
        if (Auth::check()) {
            return view('theme.content-2', ['name' => 'Admin']);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
