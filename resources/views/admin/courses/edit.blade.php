@extends('admin.layouts.app')

@section('title', 'تعديل الدورة: ' . $course->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">نموذج تعديل الدورة: {{ $course->title }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">عنوان الدورة</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $course->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $course->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="instructor_id" class="form-label">المعلم</label>
                <select class="form-control @error('instructor_id') is-invalid @enderror" id="instructor_id" name="instructor_id" required>
                    <option value="">اختر معلم</option>
                    @foreach($instructors as $instructor)
                        <option value="{{ $instructor->id }}" {{ old('instructor_id', $course->instructor_id) == $instructor->id ? 'selected' : '' }}>{{ $instructor->first_name }} {{ $instructor->last_name }}</option>
                    @endforeach
                </select>
                @error('instructor_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">السعر</label>
                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $course->price) }}" min="0" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">تحديث</button>
            <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection