@extends('admin.layouts.app')

@section('title', 'تعديل عمل الطالب: ' . $showcase->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">نموذج تعديل عمل الطالب: {{ $showcase->title }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.student-showcases.update', $showcase->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">عنوان العمل</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $showcase->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">الوصف</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description', $showcase->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="user_id" class="form-label">الطالب</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                        <option value="">اختر طالبًا</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" {{ old('user_id', $showcase->user_id) == $student->id ? 'selected' : '' }}>{{ $student->first_name }} {{ $student->last_name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="course_id" class="form-label">الدورة (اختياري)</label>
                    <select class="form-control @error('course_id') is-invalid @enderror" id="course_id" name="course_id">
                        <option value="">اختر دورة</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id', $showcase->course_id) == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                        @endforeach
                    </select>
                    @error('course_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">رابط الصورة</label>
                <input type="url" class="form-control @error('image_url') is-invalid @enderror" id="image_url" name="image_url" value="{{ old('image_url', $showcase->image_url) }}" required>
                @error('image_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $showcase->is_featured) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">
                    تمييز هذا العمل؟
                </label>
            </div>
            <button type="submit" class="btn btn-primary">تحديث</button>
            <a href="{{ route('admin.student-showcases.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection