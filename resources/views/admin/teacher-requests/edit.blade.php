@extends('admin.layouts.app')

@section('title', 'تعديل حالة طلب المعلم')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تعديل حالة طلب المعلم</div>

                <div class="card-body">
                    <p><strong>اسم المستخدم:</strong> {{ $teacherRequest->user->name ?? 'غير معروف' }}</p>
                    <p><strong>البريد الإلكتروني:</strong> {{ $teacherRequest->user->email ?? 'غير معروف' }}</p>
                    <p><strong>رسالة مقدم الطلب:</strong></p>
                    <p>{{ nl2br($teacherRequest->message) }}</p>

                    <hr>

                    <form action="{{ route('admin.teacher-requests.update', $teacherRequest->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="status" class="form-label">حالة الطلب</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="pending" {{ old('status', $teacherRequest->status) == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                                <option value="approved" {{ old('status', $teacherRequest->status) == 'approved' ? 'selected' : '' }}>قبول</option>
                                <option value="rejected" {{ old('status', $teacherRequest->status) == 'rejected' ? 'selected' : '' }}>رفض</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">رسالة الرد (اختياري)</label>
                            <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" rows="4">{{ old('message', $teacherRequest->message) }}</textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> حفظ التغييرات</button>
                        <a href="{{ route('admin.teacher-requests.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> إلغاء</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
