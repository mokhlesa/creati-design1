@extends('admin.layouts.app')

@section('title', 'طلبات المعلمين الجدد')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">طلبات المعلمين الجدد</div>

                <div class="card-body">
                    @if($teacherRequests->isEmpty())
                        <p class="text-center">لا يوجد طلبات معلمين جديدة حالياً.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المستخدم</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>حالة الطلب</th>
                                    <th>تاريخ التقديم</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teacherRequests as $request)
                                    <tr>
                                        <td>{{ $request->id }}</td>
                                        <td>{{ $request->user->name ?? 'غير معروف' }}</td>
                                        <td>{{ $request->user->email ?? 'غير معروف' }}</td>
                                        <td>{{ ucfirst($request->status) }}</td>
                                        <td>{{ $request->created_at->format('Y-m-d H:i') }}</td>
                                        <td>
                                            <a href="{{ route('admin.teacher-requests.show', $request->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> عرض</a>
                                            <form action="{{ route('admin.teacher-requests.destroy', $request->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا الطلب؟')"><i class="fas fa-trash"></i> حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
