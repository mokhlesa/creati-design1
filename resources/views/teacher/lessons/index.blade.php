@extends('teacher.layouts.app')

@section('title', 'إدارة دروس الدورة: ' . $course->title)

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">دروس دورة: {{ $course->title }}</h5>
        <a href="{{ route('teacher.courses.lessons.create', $course->id) }}" class="btn btn-primary btn-sm">إضافة درس جديد</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>الترتيب</th>
                    <th>العنوان</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($lessons as $lesson)
                    <tr>
                        <td>{{ $lesson->order }}</td>
                        <td>{{ $lesson->title }}</td>
                        <td>
                            <a href="{{ route('teacher.lessons.show', $lesson->id) }}" class="btn btn-info btn-sm">عرض</a>
                            <a href="{{ route('teacher.lessons.edit', $lesson->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('teacher.lessons.destroy', $lesson->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">لا توجد دروس في هذه الدورة بعد.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">{{ $lessons->links() }}</div>
        <a href="{{ route('teacher.courses.index') }}" class="btn btn-secondary mt-3">العودة إلى الدورات</a>
    </div>
</div>
@endsection
