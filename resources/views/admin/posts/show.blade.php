@extends('admin.layouts.app')

@section('title', 'تفاصيل المقال: ' . $post->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">{{ $post->title }}</h5>
    </div>
    <div class="card-body">
        <p><strong>الكاتب:</strong> {{ $post->user->first_name ?? 'N/A' }}</p>
        <p><strong>التصنيف:</strong> {{ $post->category->name ?? 'غير مصنف' }}</p>
        <p><strong>تاريخ النشر:</strong> {{ $post->published_at ? $post->published_at->format('d M Y') : 'غير منشور' }}</p>
        <hr>
        <div class="post-content">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">العودة إلى قائمة المقالات</a>
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">تعديل</a>
    </div>
</div>
@endsection