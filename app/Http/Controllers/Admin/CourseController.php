<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
public function index()
{
$courses = Course::with('instructor')->latest()->paginate(10);
return view('admin.courses.index', compact('courses'));
}

public function create()
{
$instructors = User::where('role_id', 2)->get(); // Role ID 2 for instructors
return view('admin.courses.create', compact('instructors'));
}

public function store(Request $request)
{
$request->validate([
'title' => 'required|string|max:255',
'description' => 'required|string',
'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
'instructor_id' => 'required|exists:users,id',
'price' => 'required|numeric|min:0',
]);

$data = [
'title' => $request->title,
'slug' => Str::slug($request->title),
'description' => $request->description,
'instructor_id' => $request->instructor_id,
'price' => $request->price,
'published_at' => now(),
];

if ($request->hasFile('image')) {
    $data['image'] = $request->file('image')->store('courses', 'public');
}

Course::create($data);

return redirect()->route('admin.courses.index')->with('success', 'تم إنشاء الدورة بنجاح.');
}

public function show(Course $course)
{
// عرض الدورة مع دروسها
$course->load('lessons');
return view('admin.courses.show', compact('course'));
}

public function edit(Course $course)
{
$instructors = User::where('role_id', 2)->get();
return view('admin.courses.edit', compact('course', 'instructors'));
}

public function update(Request $request, Course $course)
{
$request->validate([
'title' => 'required|string|max:255',
'description' => 'required|string',
'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
'instructor_id' => 'required|exists:users,id',
'price' => 'required|numeric|min:0',
]);

$data = [
'title' => $request->title,
'slug' => Str::slug($request->title),
'description' => $request->description,
'instructor_id' => $request->instructor_id,
'price' => $request->price,
];

if ($request->hasFile('image')) {
    $data['image'] = $request->file('image')->store('courses', 'public');
}

$course->update($data);

return redirect()->route('admin.courses.index')->with('success', 'تم تحديث الدورة بنجاح.');
}

public function destroy(Course $course)
{
$course->delete();
return redirect()->route('admin.courses.index')->with('success', 'تم حذف الدورة بنجاح.');
}
}