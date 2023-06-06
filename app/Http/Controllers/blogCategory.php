<?php

namespace App\Http\Controllers;

use App\Models\blogCategory as ModelsBlogCategory;
use Illuminate\Http\Request;

class blogCategory extends Controller
{
    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ModelsBlogCategory::get();
        return view('blog.category.category', compact('categories'));
    }

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $user = ModelsBlogCategory::find($request->user_id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success' => 'Status change successfully.']);
    }


    public function create()
    {
        return view('blog.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $validator = ModelsBlogCategory::create([
            'title' => $request->title,
        ]);

        if (!$validator) {
            return redirect()->route('blog.category.create')
                ->withErrors($validator);
        }
        return redirect()->route('blog.index')->with('message', 'Category created successfully');
    }
}
