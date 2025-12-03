@extends('teacher.layouts.app')

@section('title', 'إضافة درس جديد')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">إضافة درس جديد لدورة: {{ $course->title }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('teacher.courses.lessons.store', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">عنوان الدرس</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lesson_type" class="form-label">نوع الدرس</label>
                <select class="form-select" id="lesson_type" name="lesson_type">
                    <option value="text" @if(old('lesson_type') == 'text') selected @endif>محتوى نصي</option>
                    <option value="video" @if(old('lesson_type') == 'video') selected @endif>فيديو يوتيوب</option>
                    <option value="pdf" @if(old('lesson_type') == 'pdf') selected @endif>ملف PDF</option>
                </select>
            </div>

            <div id="content-field" class="mb-3">
                <label for="content" class="form-label">محتوى الدرس</label>
                <textarea class="form-control tinymce-editor @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div id="video-url-field" class="mb-3 d-none">
                <label for="video_url" class="form-label">رابط فيديو يوتيوب</label>
                <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url') }}">
                @error('video_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div id="attachment-field" class="mb-3 d-none">
                <label for="attachment" class="form-label">ملف PDF</label>
                <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="attachment" name="attachment">
                @error('attachment')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="order" class="form-label">ترتيب الدرس</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $course->lessons->count() + 1) }}" required min="1">
                @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">حفظ الدرس</button>
            <a href="{{ route('teacher.courses.lessons.index', $course->id) }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection

<x-tinymce-editor />
