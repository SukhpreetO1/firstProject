<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\UserVerify;
use Illuminate\Support\Facades\Mail;

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
                return redirect('dashboard')->with('success', 'Admin Login Successfully');
            } else if (auth()->user()->role_id == 2) {
                return redirect('user_dashboard')->with('success', 'Login Successfully');
            } else {
                return ('Invalid credentials');
            }
        }
        return redirect("login")->with('error', 'Invalid credentials');
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
        $createUser = $this->create($data);
        $token = Str::random(64);
        UserVerify::create([
            'user_id' => $createUser->id,
            'token' => $token
        ]);
        Mail::send('email.emailVerificationEmail', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Email Verification Mail');
        });
        return redirect("login")->with('success', 'Now you need to verify your account to access the login page.');
    }


    // for verifying the account before registration
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
        $message = 'Sorry your email cannot be identified.';
        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
        return redirect()->route('login')->with('message', $message);
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
            'password' => $data['password']
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

    public function user_dashboard()
    {
        return view('theme.content');
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
            'profile_pic' =>   $profile_pic,
        ];
        $check = User::where('id', Auth::user()->id)->update($data);
        return redirect("profile")->with('success', 'Profile Update Successfully');
    }


    // for logout
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login')->with('success', 'Logout Successfully');
    }
}
