<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
// تم تغيير المتغيرات لتناسب المسار المحدد في web.php
public function show(Course $course, Lesson $lesson)
{
// التأكد من أن الدرس ينتمي للدورة الصحيحة
if ($lesson->course_id !== $course->id) {
abort(404);
}

// التأكد من أن المستخدم مسجل في الدورة
$isEnrolled = Auth::user()->enrollments()->where('course_id', $course->id)->exists();
if (!$isEnrolled) {
return redirect()->route('courses.show', $course->slug)->with('error', 'يجب عليك التسجيل في الدورة أولاً لعرض هذا الدرس.');
}

return view('lessons.show', compact('course', 'lesson'));
}
}