<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\TeacherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherRequestController extends Controller
{
    public function create()
    {
        $teacherRequest = TeacherRequest::where('user_id', Auth::id())->first();
        return view('student.teacher-request.create', compact('teacherRequest'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|min:10',
        ]);

        TeacherRequest::updateOrCreate(
            ['user_id' => Auth::id()],
            ['message' => $request->message, 'status' => 'pending']
        );

        return redirect()->route('student.teacher.request.create');
    }
}
