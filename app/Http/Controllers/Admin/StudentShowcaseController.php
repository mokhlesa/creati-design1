<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentShowcase;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentShowcaseController extends Controller
{
    /**
     * عرض قائمة بجميع أعمال الطلاب.
     */
    public function index()
    {
        $showcases = StudentShowcase::with(['user', 'course'])->latest()->paginate(10);
        return view('admin.student-showcases.index', compact('showcases'));
    }

    /**
     * عرض نموذج لإنشاء عمل جديد.
     */
    public function create()
    {
        // نحتاج قائمة بالطلاب والدورات لاختيارهم في النموذج
        $students = User::where('role_id', 3)->get(); // 3 هو role_id للطلاب
        $courses = Course::all();
        return view('admin.student-showcases.create', compact('students', 'courses'));
    }

    /**
     * تخزين عمل جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'course_id' => 'nullable|exists:courses,id',
            'description' => 'nullable|string',
            'image_url' => 'required|url', // ملاحظة: في تطبيق حقيقي، هذا سيكون حقل رفع ملف
            'is_featured' => 'boolean',
        ]);

        StudentShowcase::create([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
        ]);

        return redirect()->route('admin.student-showcases.index')->with('success', 'تمت إضافة العمل بنجاح.');
    }

    /**
     * عرض تفاصيل عمل محدد.
     */
    public function show(StudentShowcase $studentShowcase)
    {
        // Route model binding يقوم بجلب الكائن مباشرة
        return view('admin.student-showcases.show', ['showcase' => $studentShowcase]);
    }

    /**
     * عرض نموذج لتعديل عمل موجود.
     */
    public function edit(StudentShowcase $studentShowcase)
    {
        $students = User::where('role_id', 3)->get();
        $courses = Course::all();
        return view('admin.student-showcases.edit', [
            'showcase' => $studentShowcase,
            'students' => $students,
            'courses' => $courses
        ]);
    }

    /**
     * تحديث بيانات العمل في قاعدة البيانات.
     */
    public function update(Request $request, StudentShowcase $studentShowcase)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'course_id' => 'nullable|exists:courses,id',
            'description' => 'nullable|string',
            'image_url' => 'required|url',
            'is_featured' => 'boolean',
        ]);

        $studentShowcase->update([
            'title' => $request->title,
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'is_featured' => $request->has('is_featured') ? 1 : 0,
        ]);

        return redirect()->route('admin.student-showcases.index')->with('success', 'تم تحديث العمل بنجاح.');
    }

    /**
     * حذف عمل من قاعدة البيانات.
     */
    public function destroy(StudentShowcase $studentShowcase)
    {
        $studentShowcase->delete();
        return redirect()->route('admin.student-showcases.index')->with('success', 'تم حذف العمل بنجاح.');
    }
}