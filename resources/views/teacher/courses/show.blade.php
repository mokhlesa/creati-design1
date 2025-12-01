@extends('teacher.layouts.app')

@section('title', 'عرض الدورة')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">تفاصيل الدورة: {{ $course->title }}</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>العنوان:</strong>
            <p>{{ $course->title }}</p>
        </div>
        <div class="mb-3">
            <strong>الوصف:</strong>
            <p>{{ $course->description }}</p>
        </div>
        <div class="mb-3">
            <strong>السعر:</strong>
            <p>{{ $course->price }}</p>
        </div>
        <div class="mb-3">
            <strong>تاريخ الإنشاء:</strong>
            <p>{{ $course->created_at->format('Y-m-d H:i') }}</p>
        </div>
        <a href="{{ route('teacher.courses.index') }}" class="btn btn-primary">العودة إلى قائمة الدورات</a>
        <a href="{{ route('teacher.courses.lessons.index', $course->id) }}" class="btn btn-info">إدارة الدروس</a>
    </div>
</div>
@endsection
