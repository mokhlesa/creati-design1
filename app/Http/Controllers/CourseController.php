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
// استخدام slug للبحث عن الدورة
// Route model binding يعتني بهذا تلقائياً
$course->load(['instructor', 'lessons' => function ($query) {
$query->orderBy('order', 'asc');
}]);
return view('courses.show', compact('course'));
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