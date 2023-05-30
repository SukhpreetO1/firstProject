<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Roles;

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
        $check = User::create($data);

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




    // to check admin or user dashboard
    public function dashboard()
    {
        if (Auth::check()) {
            return view('theme.content-2');
        }
        return redirect("login");
    }







    // for the profile page
    public function profile()
    {
        return view('theme.show');
        
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'userName' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
            'profile_pic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $profile_pic = time() . '.' . $request->profile_pic->getClientOriginalExtension();
        $request->profile_pic->move(public_path('profile_pic'), $profile_pic);
        $data = [
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'userName' => $data['userName'],
            'gender' => $data['gender'],
            'phone_number' => $data['phone_number'],
            'profile_pic' =>   $profile_pic ,
        ];
               
        $check = User::where('id',Auth::user()->id)->update($data);
        return redirect("profile")->with('success', 'Profile Update Successfully');
    }


    // for logout
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login')->with('logout_message', 'Logout Successfully');
    }
}
