@extends('admin.layouts.app')

@section('title', 'تفاصيل المستخدم: ' . $user->username)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">تفاصيل المستخدم: {{ $user->username }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 text-center">
                <img src="{{ $user->profile_image_url ?? 'https://via.placeholder.com/150' }}" alt="Profile Image" class="img-thumbnail rounded-circle" width="150">
            </div>
            <div class="col-md-10">
                <p><strong>الاسم الأول:</strong> {{ $user->first_name }}</p>
                <p><strong>الاسم الأخير:</strong> {{ $user->last_name }}</p>
                <p><strong>اسم المستخدم:</strong> {{ $user->username }}</p>
                <p><strong>البريد الإلكتروني:</strong> {{ $user->email }}</p>
                <p><strong>الدور:</strong> <span class="badge bg-info">{{ $user->role->name ?? 'N/A' }}</span></p>
                <p><strong>تاريخ التسجيل:</strong> {{ $user->created_at->format('d M Y, H:i') }}</p>
                <p><strong>آخر تحديث:</strong> {{ $user->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">العودة إلى قائمة المستخدمين</a>
        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">تعديل</a>
    </div>
</div>
@endsection