@extends('admin.layouts.app')

@section('title', 'إدارة الدورات')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">قائمة الدورات</h5>
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary btn-sm">إضافة دورة جديدة</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>العنوان</th>
                    <th>المعلم</th>
                    <th>السعر</th>
                    <th>تاريخ النشر</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($courses as $course)
                    <tr>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->instructor->first_name ?? 'N/A' }}</td>
                        <td>{{ $course->price }}</td>
                        <td>{{ $course->published_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-info btn-sm">عرض</a>
                            <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">لا توجد دورات لعرضها.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
         <div class="mt-3">{{ $courses->links() }}</div>
    </div>
</div>
@endsection