<?php

use Illuminate\Support\Facades\Route;

// المتحكمات الإدارية
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ConsultationController;
use App\Http\Controllers\Admin\StudentShowcaseController;

// المتحكمات العامة
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController; // للملف الشخصي

// =========================================================================
// == المسارات العامة (بدون مصادقة)
// =========================================================================

Route::get('/', function () {
    return view('welcome');
});

// مسارات الدورات والدروس
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{course:slug}/lessons/{lesson:slug}', [LessonController::class, 'show'])->name('lessons.show');

// مسارات المقالات (المدونة)
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// =========================================================================
// == مسارات لوحة التحكم الإدارية (Admin) - تحتاج مصادقة
// =========================================================================
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // مسار لوحة التحكم الرئيسية للمدير
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // هنا يحاول Laravel البحث عن الملف
    })->name('dashboard'); // هذا هو المسار admin.dashboard

    // مسارات CRUD الموارد
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', AdminPostController::class);
    Route::resource('courses', AdminCourseController::class);
    
    // مسارات إدارة الدروس (متداخلة)
    Route::resource('courses.lessons', AdminLessonController::class)->shallow();

    // مسارات إدارة الطلبات (عرض وحذف فقط)
    Route::resource('orders', OrderController::class)->only(['index', 'show', 'destroy']);

    // مسارات إدارة استشارات الذكاء الاصطناعي (عرض وحذف فقط)
    Route::resource('consultations', ConsultationController::class)->only(['index', 'show', 'destroy']);
    
    // مسارات إدارة أعمال الطلاب
    Route::resource('student-showcases', StudentShowcaseController::class);
});


// =========================================================================
// == مسارات للمستخدمين المسجلين (مخصصة للطالب/المعلم)
// =========================================================================
Route::middleware('auth')->group(function() {
    
    // مسار الملف الشخصي للمستخدم
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // مسار التسجيل في دورة
    Route::post('/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
    
    // مسار لتقديم استشارة تصميم AI
    // Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store'); 

    // ... يمكن إضافة مسارات أخرى مثل 'لوحة تحكم الطالب' هنا
});


// =========================================================================
// == مسارات المصادقة (Breeze)
// =========================================================================
require __DIR__.'/auth.php';