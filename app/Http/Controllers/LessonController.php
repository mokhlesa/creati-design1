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

    $user = Auth::user();

    // التأكد من أن المستخدم مسجل في الدورة
    $isEnrolled = $user->enrollments()->where('course_id', $course->id)->exists();
    if (!$isEnrolled) {
        return redirect()->route('courses.show', $course->slug)->with('error', 'يجب عليك التسجيل في الدورة أولاً لعرض هذا الدرس.');
    }
    
    // تسجيل تقدم الطالب
    \App\Models\CourseProgress::updateOrCreate(
        ['user_id' => $user->id, 'lesson_id' => $lesson->id],
        ['completed_at' => now()]
    );

    // حساب إحصائيات التقدم
    $course->load('lessons'); // التأكد من تحميل الدروس
    $totalLessons = $course->lessons->count();
    $completedLessonsCollection = $user->courseProgress()->whereIn('lesson_id', $course->lessons->pluck('id'))->get();
    $completedCount = $completedLessonsCollection->count();
    
    $progressPercentage = ($totalLessons > 0) ? ($completedCount / $totalLessons) * 100 : 0;
    
    $completedLessons = $completedLessonsCollection->pluck('lesson_id')->toArray();

    // Find next lesson
    $nextLesson = $course->lessons()->where('order', '>', $lesson->order)->orderBy('order', 'asc')->first();
    $nextLessonUrl = null;
    if ($nextLesson) {
        $nextLessonUrl = route('lessons.show', ['course' => $course->slug, 'lesson' => $nextLesson->slug]);
    }

    return view('lessons.show', compact('course', 'lesson', 'progressPercentage', 'completedLessons', 'nextLessonUrl'));
}
}