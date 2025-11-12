@extends('admin.layouts.app')

@section('title', 'تفاصيل الدورة: ' . $course->title)

@section('content')
<div class="card mb-4">
    <div class="card-header">
        <h5 class="mb-0">معلومات الدورة</h5>
    </div>
    <div class="card-body">
        <p><strong>العنوان:</strong> {{ $course->title }}</p>
        <p><strong>المعلم:</strong> {{ $course->instructor->first_name }}</p>
        <p><strong>السعر:</strong> {{ $course->price }}</p>
        <p><strong>الوصف:</strong> {!! nl2br(e($course->description)) !!}</p>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">دروس الدورة</h5>
        <a href="{{ route('admin.courses.lessons.create', $course->id) }}" class="btn btn-primary btn-sm">إضافة درس جديد</a>
    </div>
    <div class="card-body">
         @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <ul class="list-group">
            @forelse($course->lessons->sortBy('order') as $lesson)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $lesson->order }}. {{ $lesson->title }}</span>
                    <div>
                        <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                        <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">حذف</button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="list-group-item text-center">لا توجد دروس مضافة لهذه الدورة بعد.</li>
            @endforelse
        </ul>
    </div>
</div>

<div class="mt-3">
    <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">العودة إلى قائمة الدورات</a>
</div>
@endsection