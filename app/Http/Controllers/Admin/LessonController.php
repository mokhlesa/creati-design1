<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LessonController extends Controller
{
// ملاحظة: لا حاجة لدالة index هنا لأن الدروس ستُعرض ضمن صفحة الدورة

public function create(Course $course)
{
return view('admin.lessons.create', compact('course'));
}

public function store(Request $request, Course $course)
{
$request->validate([
'title' => 'required|string|max:255',
'content' => 'nullable|string',
'video_url' => 'nullable|url',
'order' => 'required|integer|min:1',
]);

$course->lessons()->create([
'title' => $request->title,
'slug' => Str::slug($request->title),
'content' => $request->content,
'video_url' => $request->video_url,
'order' => $request->order,
]);

return redirect()->route('admin.courses.show', $course)->with('success', 'تم إضافة الدرس بنجاح.');
}

public function show(Lesson $lesson)
{
return view('admin.lessons.show', compact('lesson'));
}

public function edit(Lesson $lesson)
{
// للوصول للدورة من الدرس: $lesson->course
return view('admin.lessons.edit', compact('lesson'));
}

public function update(Request $request, Lesson $lesson)
{
$request->validate([
'title' => 'required|string|max:255',
'content' => 'nullable|string',
'video_url' => 'nullable|url',
'order' => 'required|integer|min:1',
]);

$lesson->update([
'title' => $request->title,
'slug' => Str::slug($request->title),
'content' => $request->content,
'video_url' => $request->video_url,
'order' => $request->order,
]);

return redirect()->route('admin.courses.show', $lesson->course)->with('success', 'تم تحديث الدرس بنجاح.');
}

public function destroy(Lesson $lesson)
{
$course = $lesson->course;
$lesson->delete();
return redirect()->route('admin.courses.show', $course)->with('success', 'تم حذف الدرس بنجاح.');
}
}