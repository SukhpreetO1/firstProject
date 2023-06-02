<?php

namespace App\Http\Controllers;

use App\Models\Blog;
// use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'ASC')->where('user_id', Auth::user()->id)->paginate(10);
        return view('blog.home')->with([
            'blog' => $blogs
        ]);;
    }



    public function create()
    {
        return view('blog.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $validator = Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);

        if (!$validator) {
            return redirect()->route('blog.create')
                ->withErrors($validator);
        }
        return redirect()->route('blog.index')->with('message', 'Blog posted successfully');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogs = Blog::where('id', $id)->first();
        return view('blog.user.show', compact('blogs'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blogs =  Blog::whereId($id)->first();
        if (!$blogs) {
            return back()->with('error', 'Blogs Not Found');
        }
        return view('blog.user.edit', compact('blogs'))->with([
            'blog' => $blogs
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $update_user = Blog::where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            if (!$update_user) {
                DB::rollBack();
                return back()->with('error', 'Something went wrong while updating blogs');
            }
            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Blog Updated Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }




    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $delete_user = Blog::whereId($id)->delete();
            if (!$delete_user) {
                // DB::rollBack();
                return back()->with('message', 'There is an error while deleting user.');
            }

            DB::commit();
            return redirect()->route('blog.index')->with('message', 'User Deleted successfully.');
        } catch (\Throwable $th) {
            // DB::rollBack();
            throw $th;
        }
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
      
            $request->file('upload')->move(public_path('media'), $fileName);
      
            $url = asset('media/' . $fileName);
  
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
}
