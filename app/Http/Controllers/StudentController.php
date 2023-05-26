<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
// use DataTables;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        return view('student_data.student_data', compact('data'));
    }

    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> 
                    <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

//     public function destroy($id)
//     {
//         $users = User::findOrFail($id);
//         $users->delete();

//         // return redirect()->route('crud.index')->with('success','User deleted successfully');.
//         return redirect('crud')->with('success', 'Data is successfully deleted');
//     }
// }

