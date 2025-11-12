@extends('admin.layouts.app')

@section('title', 'تفاصيل الدرس: ' . $lesson->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">تفاصيل الدرس: {{ $lesson->title }}</h5>
    </div>
    <div class="card-body">
        <p><strong>الدورة:</strong> <a href="{{ route('admin.courses.show', $lesson->course->id) }}">{{ $lesson->course->title }}</a></p>
        <p><strong>عنوان الدرس:</strong> {{ $lesson->title }}</p>
        <p><strong>الاسم اللطيف (Slug):</strong> {{ $lesson->slug }}</p>
        <p><strong>الترتيب:</strong> {{ $lesson->order }}</p>
        <p><strong>رابط الفيديو:</strong> 
            @if($lesson->video_url)
                <a href="{{ $lesson->video_url }}" target="_blank">{{ $lesson->video_url }}</a>
            @else
                لا يوجد
            @endif
        </p>
        <h6>محتوى الدرس:</h6>
        <div class="border p-3 rounded bg-light">
            {!! nl2br(e($lesson->content)) !!}
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.courses.show', $lesson->course->id) }}" class="btn btn-secondary">العودة إلى الدورة</a>
        <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="btn btn-warning">تعديل الدرس</a>
    </div>
</div>
@endsection