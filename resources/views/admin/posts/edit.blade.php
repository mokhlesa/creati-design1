@extends('admin.layouts.app')

@section('title', 'تعديل المقال: ' . $post->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">نموذج تعديل المقال</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">عنوان المقال</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">المحتوى</label>
                <textarea class="form-control tinymce-editor @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content', $post->content) }}</textarea>
                @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">التصنيف</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                        <option value="">اختر تصنيفًا (اختيari)</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="user_id" class="form-label">الكاتب</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                        <option value="">اختر كاتبًا</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ old('user_id', $post->user_id) == $author->id ? 'selected' : '' }}>{{ $author->first_name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">تحديث</button>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection