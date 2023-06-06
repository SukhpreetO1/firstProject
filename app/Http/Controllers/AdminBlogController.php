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
        $admin_panel = User::with('blog')->paginate(10);
        return view('blog.admin.view', compact('admin_panel'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $userRole = User::where([['id',Auth::user()->id]])->first();
        // dd($userRole);
        $admin_panel = User::with('blog')->where('id', $id)->get();
        return view('blog.admin.show', compact('admin_panel'));
    }


    // public function store(Request $request, $id)
    // {
    //     // dd($id);
    //     $admin_panel = admin_blog::with('user')->where('id', $id)->get();

    // }
}
