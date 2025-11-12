@extends('admin.layouts.app')

@section('title', 'إضافة درس جديد للدورة: ' . $course->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">نموذج إضافة درس جديد للدورة: {{ $course->title }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.courses.lessons.store', $course->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">عنوان الدرس</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">محتوى الدرس</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="7">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="video_url" class="form-label">رابط الفيديو (اختياري)</label>
                <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url') }}">
                @error('video_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">ترتيب الدرس</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $course->lessons->max('order') + 1) }}" min="1" required>
                @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection