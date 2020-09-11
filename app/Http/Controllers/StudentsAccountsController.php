<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsAccountsController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);

        $students = Student::all();

        return view('students accounts', compact('students'));
    }
}
