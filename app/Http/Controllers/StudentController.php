<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display the student's dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $user = Auth::user();
        $enrollments = $user->enrollments()->with('course')->get();
        return view('student.dashboard', compact('enrollments'));
    }

    /**
     * Display the courses the student is enrolled in.
     *
     * @return \Illuminate\View\View
     */
    public function myCourses()
    {
        $user = Auth::user();
        $enrollments = $user->enrollments()->with('course')->get();
        return view('student.my-courses', compact('enrollments'));
    }
}