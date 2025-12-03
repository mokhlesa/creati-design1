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

        // إحصائيات التقدم
        $totalCompletedLessons = $user->courseProgress()->count();
        $completedLast7Days = $user->courseProgress()
                                   ->where('completed_at', '>=', now()->subDays(7))
                                   ->count();

        // يمكنك إضافة المزيد من الإحصائيات هنا (مثل متوسط الدروس اليومي)

        return view('student.dashboard', compact('user', 'totalCompletedLessons', 'completedLast7Days'));
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