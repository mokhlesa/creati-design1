@extends('admin.layouts.app')

@section('title', 'لوحة التحكم - المدير')

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">مرحباً بك يا مدير النظام!</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    
    <div class="row">
        <!-- بطاقة إحصاءات المستخدمين -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="card-title">إجمالي المستخدمين</h5>
                            <p class="card-text fs-3">5</p> {{-- يمكنك استبدالها بـ {{ \App\Models\User::count() }} --}}
                        </div>
                        <div class="col-4 text-center">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.users.index') }}" class="text-white text-decoration-none">عرض التفاصيل &rarr;</a>
                </div>
            </div>
        </div>

        <!-- بطاقة إحصاءات الدورات -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="card-title">الدورات المنشورة</h5>
                            <p class="card-text fs-3">2</p> {{-- يمكنك استبدالها بـ {{ \App\Models\Course::count() }} --}}
                        </div>
                        <div class="col-4 text-center">
                            <i class="fas fa-book-open fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.courses.index') }}" class="text-white text-decoration-none">إدارة الدورات &rarr;</a>
                </div>
            </div>
        </div>

        <!-- بطاقة إحصاءات الطلبات -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="card-title">الطلبات الجديدة</h5>
                            <p class="card-text fs-3">1</p>
                        </div>
                        <div class="col-4 text-center">
                            <i class="fas fa-shopping-cart fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.orders.index') }}" class="text-white text-decoration-none">عرض الطلبات &rarr;</a>
                </div>
            </div>
        </div>
        
        <!-- بطاقة إحصاءات تقييمات AI -->
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-info shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <h5 class="card-title">تقييمات AI</h5>
                            <p class="card-text fs-3">1</p>
                        </div>
                        <div class="col-4 text-center">
                            <i class="fas fa-robot fa-3x"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.consultations.index') }}" class="text-white text-decoration-none">عرض الاستشارات &rarr;</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- مثال على جدول آخر -->
    <div class="card mt-4">
        <div class="card-header">أحدث المقالات</div>
        <div class="card-body">
            <p>جدول بأحدث المقالات التي تحتاج مراجعة أو نشر...</p>
        </div>
    </div>
</div>
@endsection

<!-- ملاحظة: لاستخدام أيقونات (fa-)، يجب إضافة مكتبة Font Awesome في ملف layouts/app.blade.php -->
 