@extends('admin.layouts.app')

@section('title', 'إدارة المقالات')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">قائمة المقالات</h5>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-sm">إضافة مقال جديد</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>الكاتب</th>
                    <th>التصنيف</th>
                    <th>تاريخ النشر</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->first_name ?? 'N/A' }}</td>
                        <td>{{ $post->category->name ?? 'غير مصنف' }}</td>
                        <td>{{ $post->published_at ? $post->published_at->format('Y-m-d') : 'غير منشور' }}</td>
                        <td>
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info btn-sm">عرض</a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">لا توجد مقالات لعرضها.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">{{ $posts->links() }}</div>
    </div>
</div>
@endsection