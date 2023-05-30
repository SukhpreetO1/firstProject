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
                    $actionBtn = "<a href='#' class='edit btn btn-success btn-sm' data-id='" . $row->id . "' data-bs-toggle='modal' data-bs-target='#updateStudent' id='updateStudent'>Edit</a>";
                    $deleteButton = "<a href='#' class='delete btn btn-danger btn-sm' data-id='" . $row->id . "' id='delete'>Delete</a>";
                    return $actionBtn . " " . $deleteButton;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // for deleting the user from the database
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

    // Update record
    public function updateStudent(Request $request)
    {
        $id = $request->get('id');
        $studentData = Student::find($id);
        
        $response = array();
        if (!empty($studentData)) {
            $updateStudentData['first_name'] = $request->post('first_name');
            $updateStudentData['last_name'] = $request->post('last_name');
            $updateStudentData['email'] = $request->post('email');
            $updateStudentData['userName'] = $request->post('userName');
            $updateStudentData['phone_number'] = $request->post('phone_number');
            $updateStudentData['dob'] = $request->post('dob');

            if ($studentData->update($updateStudentData)) {
                $response['success'] = 1;
                $response['msg'] = 'Update successfully';
            } else {
                $response['success'] = 0;
                $response['msg'] = 'Record not updated';
            }
        } else {
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response);
    }
}
