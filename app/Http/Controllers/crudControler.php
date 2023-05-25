<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class crudControler extends Controller
{
    /**products
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(10);

        return view('crud.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
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
            'password' => 'required|min:6',
        ]);

        User::create($request->all());

        return redirect()->route('crud.index')->with('success', 'User created successfully.');
    }

    /**class
     * Display the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response>with('i', (request()->input('page', 1) - 1) * 5
     */
    public function show(User $users)
    {
        return view('crud.show', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(User $users)
    {
        return view('crud.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
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

        $users->update($request->all());

        return redirect()->route('crud.index')->with('success', 'User updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Models\User  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users)
    {
        $users = User::findOrFail($id);

        $users->delete();

        // return redirect()->route('crud.index')->with('success','User deleted successfully');.
        return redirect('crud.index')->with('success', 'Data is successfully deleted');
    }
}
