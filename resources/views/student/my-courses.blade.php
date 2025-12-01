@extends('student.layouts.app')

@section('title', 'دوراتي')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">دوراتي</h1>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header">دوراتي المسجل بها</div>
        <div class="card-body">
            <div class="row">
                @forelse ($enrollments as $enrollment)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $enrollment->course->title }}</h5>
                                <p class="card-text">{{ Str::limit($enrollment->course->description, 100) }}</p>
                                <a href="{{ route('courses.show', $enrollment->course->slug) }}" class="btn btn-primary">الذهاب إلى الدورة</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-muted">لم تسجل في أي دورات بعد.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
