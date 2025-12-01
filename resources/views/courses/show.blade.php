@extends('student.layouts.app')

@section('title', 'عرض الدورة')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">تفاصيل الدورة: {{ $course->title }}</h5>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <strong>الوصف:</strong>
                <p class="text-muted">{{ $course->description }}</p>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <strong>بواسطة:</strong>
                    <p>{{ $course->instructor->first_name }} {{ $course->instructor->last_name }}</p>
                </div>
                <div class="col-md-6">
                    <strong>السعر:</strong>
                    <p>{{ $course->price > 0 ? '$' . $course->price : 'مجاني' }}</p>
                </div>
            </div>
            
            <hr>

            <h5 class="mt-4 mb-3">دروس الدورة</h5>
            <div class="list-group">
                @forelse($course->lessons as $lesson)
                    <a href="{{ route('lessons.show', ['course' => $course->slug, 'lesson' => $lesson->slug]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        {{ $lesson->title }}
                        <i class="fas fa-play-circle"></i>
                    </a>
                @empty
                    <div class="list-group-item">لا توجد دروس متاحة في هذه الدورة بعد.</div>
                @endforelse
            </div>

            <div class="mt-4">
                <a href="{{ route('student.my-courses') }}" class="btn btn-outline-secondary">العودة إلى دوراتي</a>
            </div>
        </div>
    </div>
</div>
@endsection
