<?php

namespace App\Http\Controllers;

use App\Models\admin_blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminBlogController extends Controller
{
    public function index()
    {
        // $users = User::count();
        // $admin_panel = admin_blog::orderBy('id', 'ASC')->where('user_id', Auth::user()->id)->paginate(10);
        // return view('posts.home')->with([
        //     'admin_panel' => $admin_panel
        // ]);
        // $admin_panel = User::all();
        // dd($admin_panel);
        // return view('posts.home', compact('admin_panel'));
        $admin_panel = User::all();
        // $admin_panel = admin_blog::orderBy('id', 'ASC')->where('user_id', Auth::user()->id)->paginate(10);
        // dd($admin_panel);
        return view('blog.admin.view', compact('admin_panel'));

    }
}
