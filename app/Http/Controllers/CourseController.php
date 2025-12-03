<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
public function index()
{
$courses = Course::whereNotNull('published_at')->latest()->paginate(9);
return view('courses.index', compact('courses'));
}

public function show(Course $course)
{
    $course->load(['instructor', 'lessons' => function ($query) {
        $query->orderBy('order', 'asc');
    }]);

    $isEnrolled = false;
    $progressPercentage = 0;
    $completedLessons = [];
    $nextLessonUrl = null;

    if (Auth::check()) {
        $user = Auth::user();
        $isEnrolled = $user->enrollments()->where('course_id', $course->id)->exists();

        if ($isEnrolled) {
            $totalLessons = $course->lessons->count();
            $completedLessonIds = $user->courseProgress()
                                      ->whereIn('lesson_id', $course->lessons->pluck('id'))
                                      ->pluck('lesson_id');
            
            $completedCount = $completedLessonIds->count();

            if ($totalLessons > 0) {
                $progressPercentage = ($completedCount / $totalLessons) * 100;
            }
            
            $completedLessons = $completedLessonIds->toArray();

            // Find the next lesson
            $nextLesson = $course->lessons->first(function ($lesson) use ($completedLessons) {
                return !in_array($lesson->id, $completedLessons);
            });

            if ($nextLesson) {
                $nextLessonUrl = route('lessons.show', ['course' => $course->slug, 'lesson' => $nextLesson->slug]);
            }
        }
    }

    return view('courses.show', compact('course', 'isEnrolled', 'progressPercentage', 'completedLessons', 'nextLessonUrl'));
}

public function enroll(Request $request)
{
$request->validate(['course_id' => 'required|exists:courses,id']);

// تحقق من أن المستخدم لم يسجل في الدورة مسبقًا
$alreadyEnrolled = Enrollment::where('user_id', Auth::id())
->where('course_id', $request->course_id)
->exists();

if ($alreadyEnrolled) {
return back()->with('error', 'أنت مسجل بالفعل في هذه الدورة.');
}

// هنا يجب إضافة منطق الدفع أولاً قبل التسجيل
// للتسهيل، سنقوم بالتسجيل مباشرة
Enrollment::create([
'user_id' => Auth::id(),
'course_id' => $request->course_id,
]);

return redirect()->route('courses.show', Course::find($request->course_id)->slug)
->with('success', 'تم تسجيلك في الدورة بنجاح!');
}
}