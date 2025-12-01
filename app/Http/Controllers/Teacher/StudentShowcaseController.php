<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\StudentShowcase;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentShowcaseController extends Controller
{
    /**
     * Display a listing of the teacher's students.
     */
    public function index()
    {
        // Get the courses taught by the current teacher
        $teacherCourses = Auth::user()->courses;

        // Get the IDs of these courses
        $courseIds = $teacherCourses->pluck('id');

        // Get the users (students) enrolled in these courses
        $students = User::whereHas('enrollments', function ($query) use ($courseIds) {
            $query->whereIn('course_id', $courseIds);
        })->with('studentShowcases')->paginate(10);

        return view('teacher.students.index', compact('students'));
    }

    /**
     * Display the specified student's showcases.
     */
    public function show(User $student)
    {
        // Optional: Add authorization to ensure the teacher can only view their own students
        $showcases = $student->studentShowcases()->paginate(10);
        return view('teacher.students.showcases', compact('student', 'showcases'));
    }
}
