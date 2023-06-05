<?php

namespace App\Http\Controllers;

use App\Models\User;

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
        $admin_panel = User::with('blog')->where('id', $id)->get();
        return view('blog.admin.show', compact('admin_panel'));
    }
}
