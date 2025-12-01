<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LessonController extends Controller
{
    public function index(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }
        $lessons = $course->lessons()->orderBy('order')->paginate(10);
        return view('teacher.lessons.index', compact('course', 'lessons'));
    }

    public function create(Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }
        return view('teacher.lessons.create', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        if ($course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'required|integer|min:1',
            'lesson_type' => 'required|in:text,video,pdf',
            'content' => 'required_if:lesson_type,text',
            'video_url' => 'required_if:lesson_type,video|nullable|url',
            'attachment' => 'required_if:lesson_type,pdf|nullable|file|mimes:pdf|max:10240', // 10MB Max
        ]);

        $data = $request->only(['title', 'order', 'lesson_type', 'content', 'video_url']);
        $data['slug'] = Str::slug($request->title);

        if ($request->lesson_type === 'pdf' && $request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('lesson_attachments', 'public');
        }

        $course->lessons()->create($data);

        return redirect()->route('teacher.courses.lessons.index', $course)->with('success', 'تم إنشاء الدرس بنجاح.');
    }

    public function show(Lesson $lesson)
    {
        if ($lesson->course->instructor_id !== Auth::id()) {
            abort(403);
        }
        return view('teacher.lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        if ($lesson->course->instructor_id !== Auth::id()) {
            abort(403);
        }
        return view('teacher.lessons.edit', compact('lesson'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        if ($lesson->course->instructor_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'required|integer|min:1',
            'lesson_type' => 'required|in:text,video,pdf',
            'content' => 'required_if:lesson_type,text',
            'video_url' => 'required_if:lesson_type,video|nullable|url',
            'attachment' => 'nullable|file|mimes:pdf|max:10240', // 10MB Max
        ]);

        $data = $request->only(['title', 'order', 'lesson_type', 'content', 'video_url']);
        $data['slug'] = Str::slug($request->title);

        if ($request->lesson_type === 'pdf' && $request->hasFile('attachment')) {
            // Delete old attachment if it exists
            if ($lesson->attachment_path) {
                Storage::disk('public')->delete($lesson->attachment_path);
            }
            $data['attachment_path'] = $request->file('attachment')->store('lesson_attachments', 'public');
        }

        $lesson->update($data);

        return redirect()->route('teacher.courses.lessons.index', $lesson->course)->with('success', 'تم تحديث الدرس بنجاح.');
    }

    public function destroy(Lesson $lesson)
    {
        if ($lesson->course->instructor_id !== Auth::id()) {
            abort(403);
        }
        $course = $lesson->course;
        $lesson->delete();
        return redirect()->route('teacher.courses.lessons.index', $course)->with('success', 'تم حذف الدرس بنجاح.');
    }
}
