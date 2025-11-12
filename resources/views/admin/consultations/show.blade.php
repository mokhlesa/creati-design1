@extends('admin.layouts.app')

@section('title', 'تفاصيل الاستشارة #' . $consultation->id)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">تفاصيل الاستشارة رقم #{{ $consultation->id }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6>معلومات المستخدم</h6>
                <p><strong>الاسم:</strong> {{ $consultation->user->first_name ?? 'مستخدم محذوف' }}</p>
                <p><strong>البريد الإلكتروني:</strong> {{ $consultation->user->email ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <h6>تفاصيل الاستشارة</h6>
                <p><strong>تاريخ الطلب:</strong> {{ $consultation->created_at->format('Y-m-d H:i') }}</p>
                <p><strong>الرسالة:</strong> {!! nl2br(e($consultation->message)) !!}</p>
                <p><strong>الحالة:</strong> <span class="badge bg-info">{{ $consultation->status }}</span></p>
            </div>
        </div>
        <hr>
        <h6>تقييم الذكاء الاصطناعي</h6>
        @if($consultation->feedback)
            <p><strong>التقييم:</strong> {!! nl2br(e($consultation->feedback->feedback_text)) !!}</p>
            <p><strong>تاريخ التقييم:</strong> {{ $consultation->feedback->created_at->format('Y-m-d H:i') }}</p>
        @else
            <p>لا يوجد تقييم لهذه الاستشارة بعد.</p>
        @endif
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.consultations.index') }}" class="btn btn-secondary">العودة لقائمة الاستشارات</a>
    </div>
</div>
@endsection