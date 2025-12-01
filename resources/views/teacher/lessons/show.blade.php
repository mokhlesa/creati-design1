@extends('teacher.layouts.app')

@section('title', 'عرض الدرس')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">تفاصيل الدرس: {{ $lesson->title }}</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>العنوان:</strong>
            <p>{{ $lesson->title }}</p>
        </div>
        <div class="mb-3">
            <strong>المحتوى:</strong>
            @if($lesson->lesson_type == 'video' && $lesson->video_url)
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ Str::after($lesson->video_url, 'v=') }}" allowfullscreen></iframe>
                </div>
            @elseif($lesson->lesson_type == 'pdf' && $lesson->attachment_path)
                <a href="{{ Storage::url($lesson->attachment_path) }}" target="_blank" class="btn btn-primary">تحميل وعرض ملف PDF</a>
            @else
                <div>{!! $lesson->content !!}</div>
            @endif
        </div>
        <div class="mb-3">
            <strong>الترتيب:</strong>
            <p>{{ $lesson->order }}</p>
        </div>
        <div class="mb-3">
            <strong>الدورة:</strong>
            <p><a href="{{ route('teacher.courses.show', $lesson->course->id) }}">{{ $lesson->course->title }}</a></p>
        </div>
        <a href="{{ route('teacher.courses.lessons.index', $lesson->course->id) }}" class="btn btn-primary">العودة إلى قائمة الدروس</a>
    </div>
</div>
@endsection
