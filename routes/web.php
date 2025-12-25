<?php

use App\Http\Controllers\HelpController;

use Illuminate\Support\Facades\Route;

// المتحكمات الإدارية
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ConsultationController as AdminConsultationController;
use App\Http\Controllers\Admin\StudentShowcaseController;

// المتحكمات العامة
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController; // للملف الشخصي
use App\Http\Controllers\ConsultationController;

use App\Http\Controllers\StudentController;

use App\Http\Controllers\PortfolioController;

// =========================================================================
// == المسارات العامة (بدون مصادقة)
// =========================================================================

Route::get('/', function () {
    return view('welcome');
});

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');


// مسارات الدورات والدروس
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course:slug}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/courses/{course:slug}/lessons/{lesson:slug}', [LessonController::class, 'show'])->name('lessons.show');

// مسارات المقالات (المدونة)
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// مسار صفحة تقييم التصميم بالذكاء الاصطناعي
Route::get('/ai-assessor', [ConsultationController::class, 'showAssessorPage'])->name('ai-assessor');

// مسار صفحة المجتمع التفاعلي
Route::get('/community', function() {
    return view('community.index');
})->name('community.index');

// مسار صفحة من نحن
Route::get('/about', function() {
    return view('about.index');
})->name('about.index');

// مسار صفحة المساعدة
Route::get('/help', [HelpController::class, 'index'])->name('help.index');
Route::get('/help/search', [HelpController::class, 'search'])->name('help.search');

Route::get('/features', function() {
    return view('features.index');
})->name('features.index');

Route::get('/contact', function() {
    return view('contact.index');
})->name('contact.index');



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
    Route::resource('consultations', AdminConsultationController::class)->only(['index', 'show', 'destroy']);
    
    // مسارات إدارة أعمال الطلاب
    Route::resource('student-showcases', StudentShowcaseController::class);
    Route::resource('portfolios', \App\Http\Controllers\Admin\PortfolioController::class);
    Route::resource('social-links', \App\Http\Controllers\Admin\SocialLinkController::class);
    Route::resource('teacher-requests', \App\Http\Controllers\Admin\TeacherRequestController::class);
    Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'store'])->name('settings.store');
});

// =========================================================================
// == مسارات لوحة تحكم المعلم (Teacher) - تحتاج مصادقة
// =========================================================================
Route::prefix('teacher')->name('teacher.')->middleware(['auth', 'teacher'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\TeacherController::class, 'dashboard'])->name('dashboard');

    Route::resource('courses', App\Http\Controllers\Teacher\CourseController::class);
    Route::resource('courses.lessons', App\Http\Controllers\Teacher\LessonController::class)->shallow();

    // Routes for viewing students and their showcases
    Route::get('/students', [App\Http\Controllers\Teacher\StudentShowcaseController::class, 'index'])->name('students.index');
    Route::get('/students/{student}/showcases', [App\Http\Controllers\Teacher\StudentShowcaseController::class, 'show'])->name('students.showcases');
});


// =========================================================================
// == مسارات للمستخدمين المسجلين (مخصصة للطالب/المعلم)
// =========================================================================
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function () {
        if (auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        if (auth()->user()->isTeacher()) {
            return redirect()->route('teacher.dashboard');
        }
        return redirect()->route('student.dashboard');
    })->name('dashboard');

    // مسار الملف الشخصي للمستخدم
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // مسار التسجيل في دورة
    Route::post('/enroll', [CourseController::class, 'enroll'])->name('courses.enroll');
    
    // مسار لتقديم استشارة تصميم AI
    Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store'); 

    // ... يمكن إضافة مسارات أخرى مثل 'لوحة تحكم الطالب' هنا
});

// =========================================================================
// == مسارات الطالب
// =========================================================================
Route::prefix('student')->name('student.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/my-courses', [StudentController::class, 'myCourses'])->name('my-courses');
    Route::resource('consultation', \App\Http\Controllers\Student\ConsultationController::class);
    Route::resource('showcases', \App\Http\Controllers\Student\ShowcaseController::class);
    Route::get('/teacher-request/create', [\App\Http\Controllers\Student\TeacherRequestController::class, 'create'])->name('teacher.request.create');
    Route::post('/teacher-request', [\App\Http\Controllers\Student\TeacherRequestController::class, 'store'])->name('teacher.request.store');
});


// =========================================================================
// == مسارات المصادقة (Breeze)
// =========================================================================
require __DIR__.'/auth.php';
