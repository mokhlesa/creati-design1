@extends('student.layouts.app')

@section('title', 'معارضي')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">معارضي</h1>
        <a href="{{ route('student.showcases.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> إضافة معرض جديد
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            @forelse ($showcases as $showcase)
                <div class="d-flex justify-content-between align-items-center py-3 border-bottom">
                    <div>
                        <h5 class="mb-1"><a href="{{ route('student.showcases.show', $showcase) }}" class="text-decoration-none text-dark">{{ $showcase->title }}</a></h5>
                        <p class="text-muted mb-0">{{ Str::limit($showcase->description, 150) }}</p>
                    </div>
                    <div>
                        <a href="{{ route('student.showcases.edit', $showcase) }}" class="btn btn-sm btn-outline-primary me-2">تعديل</a>
                        <form action="{{ route('student.showcases.destroy', $showcase) }}" method="POST" class="d-inline" onsubmit="return confirm('هل أنت متأكد؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">حذف</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-muted">لم تقم بإنشاء أي معارض بعد.</p>
            @endforelse

            <div class="mt-4">
                {{ $showcases->links() }}
            </div>
        </div>
    </div>
@endsection
