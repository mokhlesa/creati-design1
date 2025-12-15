@extends('admin.layouts.app')

@section('title', 'تفاصيل طلب المعلم')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تفاصيل طلب المعلم</div>

                <div class="card-body">
                    <p><strong>اسم المستخدم:</strong> {{ $teacherRequest->user->name ?? 'غير معروف' }}</p>
                    <p><strong>البريد الإلكتروني:</strong> {{ $teacherRequest->user->email ?? 'غير معروف' }}</p>
                    <p><strong>حالة الطلب:</strong> {{ ucfirst($teacherRequest->status) }}</p>
                    <p><strong>تاريخ التقديم:</strong> {{ $teacherRequest->created_at->format('Y-m-d H:i') }}</p>
                    <p><strong>رسالة مقدم الطلب:</strong></p>
                    <p>{{ nl2br($teacherRequest->message) }}</p>

                    <hr>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.teacher-requests.edit', $teacherRequest->id) }}" class="btn btn-primary me-2"><i class="fas fa-edit"></i> تعديل الحالة</a>
                        <a href="{{ route('admin.teacher-requests.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> العودة للقائمة</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
