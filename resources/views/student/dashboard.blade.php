@extends('student.layouts.app')

@section('title', 'لوحة تحكم الطالب')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">مرحباً بعودتك, {{ $user->first_name }}!</h1>
    </div>

    <!-- قسم الإحصائيات -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-check-circle fa-3x text-success me-4"></i>
                    <div>
                        <h5 class="card-title mb-1">إجمالي الدروس المكتملة</h5>
                        <p class="card-text fs-4 fw-bold">{{ $totalCompletedLessons }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <i class="fas fa-chart-line fa-3x text-warning me-4"></i>
                    <div>
                        <h5 class="card-title mb-1">مثابرتك هذا الأسبوع</h5>
                        <p class="card-text fs-4 fw-bold">{{ $completedLast7Days }} دروس</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- نهاية قسم الإحصائيات -->


    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-book-open fa-3x text-primary mb-3"></i>
                    <h5 class="card-title">دوراتي</h5>
                    <p class="card-text">الوصول إلى الدورات المسجل بها وتتبع تقدمك.</p>
                    <a href="{{ route('student.my-courses') }}" class="btn btn-primary">الذهاب إلى الدورات</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-lightbulb fa-3x text-info mb-3"></i>
                    <h5 class="card-title">استشارة تصميم بالذكاء الاصطناعي</h5>
                    <p class="card-text">احصل على ملاحظات حول تصاميمك باستخدام أداتنا المدعومة بالذكاء الاصطناعي.</p>
                    <a href="{{ route('student.consultation.create') }}" class="btn btn-info">طلب استشارة</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-center h-100 shadow-sm">
                <div class="card-body">
                    <i class="fas fa-palette fa-3x text-success mb-3"></i>
                    <h5 class="card-title">معرض أعمالي</h5>
                    <p class="card-text">إدارة وعرض أفضل أعمالك للمجتمع.</p>
                    <a href="{{ route('student.showcases.index') }}" class="btn btn-success">عرض المعرض</a>
                </div>
            </div>
        </div>
    </div>
@endsection
