@extends('admin.layouts.app')

@section('title', 'تفاصيل عمل الطالب: ' . $showcase->title)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">تفاصيل عمل الطالب: {{ $showcase->title }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="{{ $showcase->image_url }}" alt="{{ $showcase->title }}" class="img-thumbnail mb-3">
            </div>
            <div class="col-md-8">
                <p><strong>العنوان:</strong> {{ $showcase->title }}</p>
                <p><strong>الطالب:</strong> {{ $showcase->user->first_name ?? 'N/A' }} {{ $showcase->user->last_name ?? '' }}</p>
                <p><strong>الدورة:</strong> {{ $showcase->course->title ?? 'N/A' }}</p>
                <p><strong>مميز:</strong> 
                    @if($showcase->is_featured)
                        <span class="badge bg-success">نعم</span>
                    @else
                        <span class="badge bg-secondary">لا</span>
                    @endif
                </p>
                <p><strong>تاريخ الإضافة:</strong> {{ $showcase->created_at->format('d M Y, H:i') }}</p>
                <h6>الوصف:</h6>
                <div class="border p-3 rounded bg-light">
                    {!! nl2br(e($showcase->description)) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.student-showcases.index') }}" class="btn btn-secondary">العودة إلى قائمة أعمال الطلاب</a>
        <a href="{{ route('admin.student-showcases.edit', $showcase->id) }}" class="btn btn-warning">تعديل</a>
    </div>
</div>
@endsection