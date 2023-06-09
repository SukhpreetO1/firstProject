<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::select('id', 'email', 'first_name', 'last_name', 'userName')->get();
        $users = User::orderBy('id', 'asc')->paginate(5);
        return view('view_user.list')->with([
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('view_user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'userName' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $create_user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'userName' => $request->userName,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
            ]);

            if (!$create_user) {
                DB::rollBack();
                return back()->with('error', 'Something went wrong while saving user data');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Stored Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('view_user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =  User::whereId($id)->first();
        if (!$user) {
            return back()->with('error', 'User Not Found');
        }
        return view('view_user.edit')->with([
            'user' => $user
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'userName' => 'required',
            'gender' => 'required',
            'phone_number' => 'required',
        ]);

        try {
            DB::beginTransaction();
            $update_user = User::where('id', $id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'userName' => $request->userName,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
            ]);

            if (!$update_user) {
                DB::rollBack();
                return back()->with('error', 'Something went wrong while update user data');
            }
            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Updated Successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $delete_user = User::whereId($id)->delete();
            if (!$delete_user) {
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting user.');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Deleted successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
