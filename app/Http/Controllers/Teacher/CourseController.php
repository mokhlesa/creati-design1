<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Auth::user()->courses()->latest()->paginate(10);
        return view('teacher.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('teacher.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:courses,title',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $course = Auth::user()->courses()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'published_at' => now(), // Or handle publishing separately
        ]);

        return redirect()->route('teacher.courses.index')->with('success', 'تم إنشاء الدورة بنجاح.');
    }

    public function show(Course $course)
    {
        // Ensure the teacher can only view their own courses
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }
        return view('teacher.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }
        return view('teacher.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255|unique:courses,title,' . $course->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $course->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->route('teacher.courses.index')->with('success', 'تم تحديث الدورة بنجاح.');
    }

    public function destroy(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }
        $course->delete();
        return redirect()->route('teacher.courses.index')->with('success', 'تم حذف الدورة بنجاح.');
    }
}
