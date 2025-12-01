<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;
use App\Models\Post;

class TeacherController extends Controller
{
    public function dashboard()
    {
        $teacherId = Auth::id();
        $courses = Course::where('instructor_id', $teacherId)->with('lessons')->get();
        $posts = Post::where('user_id', $teacherId)->get();

        return view('teacher.dashboard', compact('courses', 'posts'));
    }
}
