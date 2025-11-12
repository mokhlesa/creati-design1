@extends('admin.layouts.app')

@section('title', 'إدارة أعمال الطلاب')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0">قائمة أعمال الطلاب</h5>
        <a href="{{ route('admin.student-showcases.create') }}" class="btn btn-primary btn-sm">إضافة عمل جديد</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>صورة العمل</th>
                    <th>العنوان</th>
                    <th>الطالب</th>
                    <th>الدورة</th>
                    <th>مميز؟</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($showcases as $showcase)
                    <tr>
                        <td><img src="{{ $showcase->image_url }}" alt="{{ $showcase->title }}" width="100" class="img-thumbnail"></td>
                        <td>{{ $showcase->title }}</td>
                        <td>{{ $showcase->user->first_name ?? 'N/A' }}</td>
                        <td>{{ $showcase->course->title ?? 'N/A' }}</td>
                        <td>
                            @if($showcase->is_featured)
                                <span class="badge bg-success">نعم</span>
                            @else
                                <span class="badge bg-secondary">لا</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.student-showcases.show', $showcase->id) }}" class="btn btn-info btn-sm">عرض</a>
                            <a href="{{ route('admin.student-showcases.edit', $showcase->id) }}" class="btn btn-warning btn-sm">تعديل</a>
                            <form action="{{ route('admin.student-showcases.destroy', $showcase->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">لا توجد أعمال طلاب لعرضها.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">{{ $showcases->links() }}</div>
    </div>
</div>
@endsection