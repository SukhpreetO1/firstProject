<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::latest()->get();
        return view('student_data.student_data', compact('data'));
    }
}
