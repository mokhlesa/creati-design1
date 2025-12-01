@extends('teacher.layouts.app')

@section('title', 'تعديل الدرس')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">تعديل الدرس: {{ $lesson->title }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('teacher.lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data">
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
                <label for="lesson_type" class="form-label">نوع الدرس</label>
                <select class="form-select" id="lesson_type" name="lesson_type">
                    <option value="text" @if(old('lesson_type', $lesson->lesson_type) == 'text') selected @endif>محتوى نصي</option>
                    <option value="video" @if(old('lesson_type', $lesson->lesson_type) == 'video') selected @endif>فيديو يوتيوب</option>
                    <option value="pdf" @if(old('lesson_type', $lesson->lesson_type) == 'pdf') selected @endif>ملف PDF</option>
                </select>
            </div>

            <div id="content-field" class="mb-3">
                <label for="content" class="form-label">محتوى الدرس</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="tinymce" name="content" rows="10">{{ old('content', $lesson->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div id="video-url-field" class="mb-3 d-none">
                <label for="video_url" class="form-label">رابط فيديو يوتيوب</label>
                <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $lesson->video_url) }}">
                @error('video_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div id="attachment-field" class="mb-3 d-none">
                <label for="attachment" class="form-label">ملف PDF (اتركه فارغاً لعدم التغيير)</label>
                <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="attachment" name="attachment">
                @error('attachment')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if($lesson->attachment_path)
                    <div class="mt-2">
                        الملف الحالي: <a href="{{ Storage::url($lesson->attachment_path) }}" target="_blank">عرض الملف</a>
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="order" class="form-label">ترتيب الدرس</label>
                <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $lesson->order) }}" required min="1">
                @error('order')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">تحديث الدرس</button>
            <a href="{{ route('teacher.courses.lessons.index', $lesson->course->id) }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#tinymce',
        plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
        toolbar_mode: 'floating',
    });

    document.addEventListener('DOMContentLoaded', function() {
        const lessonType = document.getElementById('lesson_type');
        const contentField = document.getElementById('content-field');
        const videoUrlField = document.getElementById('video-url-field');
        const attachmentField = document.getElementById('attachment-field');

        function toggleFields() {
            contentField.classList.add('d-none');
            videoUrlField.classList.add('d-none');
            attachmentField.classList.add('d-none');

            if (lessonType.value === 'text') {
                contentField.classList.remove('d-none');
            } else if (lessonType.value === 'video') {
                videoUrlField.classList.remove('d-none');
            } else if (lessonType.value === 'pdf') {
                attachmentField.classList.remove('d-none');
            }
        }

        toggleFields();
        lessonType.addEventListener('change', toggleFields);
    });
</script>
@endpush
