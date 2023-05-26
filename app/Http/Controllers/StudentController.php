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
                ->addColumn('action', function ($row) {
                    $actionBtn = "<a href='#' class='edit btn btn-success btn-sm' data-id='" . $row->id . "' id='edit'>Edit</a>";

                    $deleteButton = "<a href='#' class='delete btn btn-danger btn-sm' data-id='" . $row->id . "' id='delete'>Delete</a>";
                    return $actionBtn . " " . $deleteButton;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function deleteStudent(Request $request)
    {
        $id = $request->post('id');
        $studentData = Student::find($id);

        if ($studentData->delete()) {
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully';
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response);
    }
}
