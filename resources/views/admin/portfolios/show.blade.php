@extends('admin.layouts.app')

@section('title', 'تفاصيل معرض الأعمال')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تفاصيل معرض الأعمال: {{ $portfolio->title }}</div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        @if($portfolio->image_path)
                            <img src="{{ Storage::url($portfolio->image_path) }}" alt="{{ $portfolio->title }} image" class="img-fluid rounded" style="max-width: 300px;">
                        @else
                            <p class="text-muted">لا توجد صورة لهذا المعرض.</p>
                        @endif
                    </div>

                    <p><strong>عنوان معرض الأعمال:</strong> {{ $portfolio->title }}</p>
                    <p><strong>الوصف:</strong></p>
                    <p>{{ nl2br($portfolio->description) }}</p>
                    
                    @if($portfolio->url)
                        <p><strong>رابط:</strong> <a href="{{ $portfolio->url }}" target="_blank">{{ $portfolio->url }}</a></p>
                    @endif
                    
                    <p><strong>مُضاف بواسطة:</strong> {{ $portfolio->user->name ?? 'غير معروف' }} ({{ $portfolio->user->email ?? 'غير معروف' }})</p>
                    <p><strong>تاريخ الإنشاء:</strong> {{ $portfolio->created_at->format('Y-m-d H:i') }}</p>

                    <hr>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-primary me-2"><i class="fas fa-edit"></i> تعديل</a>
                        <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> العودة للقائمة</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
