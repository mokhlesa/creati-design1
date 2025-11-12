@extends('admin.layouts.app')

@section('title', 'إدارة استشارات AI')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">قائمة الاستشارات</h5>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المستخدم</th>
                    <th>الحالة</th>
                    <th>تاريخ الطلب</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($consultations as $consultation)
                    <tr>
                        <td>{{ $consultation->id }}</td>
                        <td>{{ $consultation->user->first_name ?? 'N/A' }}</td>
                        <td><span class="badge bg-info">{{ $consultation->status }}</span></td>
                        <td>{{ $consultation->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.consultations.show', $consultation->id) }}" class="btn btn-info btn-sm">عرض</a>
                            <form action="{{ route('admin.consultations.destroy', $consultation->id) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">لا توجد استشارات لعرضها.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">{{ $consultations->links() }}</div>
    </div>
</div>
@endsection