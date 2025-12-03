@extends('admin.layouts.app')

@section('title', 'تعديل الدرس: ' . $lesson->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">نموذج تعديل الدرس: {{ $lesson->title }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">عنوان الدرس</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $lesson->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">محتوى الدرس</label>
                <textarea class="form-control tinymce-editor @error('content') is-invalid @enderror" id="content" name="content" rows="7">{{ old('content', $lesson->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="video_url" class="form-label">رابط الفيديو (اختياري)</label>
                <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $lesson->video_url) }}">
                @error('video_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">ترتيب الدرس</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $lesson->order) }}" min="1" required>
                @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">تحديث</button>
            <a href="{{ route('admin.courses.show', $lesson->course->id) }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection