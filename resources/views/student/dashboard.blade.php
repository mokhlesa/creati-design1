@extends('student.layouts.app')

@section('title', 'لوحة تحكم الطالب')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">لوحة تحكم الطالب</h1>
    </div>

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

    <div class="card shadow-sm mb-4">
        <div class="card-header">دوراتي المسجل بها</div>
        <div class="card-body">
            <div class="row">
                @forelse ($enrollments as $enrollment)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $enrollment->course->title }}</h5>
                                <p class="card-text">{{ Str::limit($enrollment->course->description, 100) }}</p>
                                <a href="{{ route('courses.show', $enrollment->course->slug) }}" class="btn btn-primary">الذهاب إلى الدورة</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted">لم تسجل في أي دورات بعد.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
