@extends('layouts.public')

@section('content')
<div class="py-5" style="margin-top: 5rem;">
    <div class="container">
        
        <!-- Page Header -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-dark">
                جميع الدورات
            </h1>
            <p class="lead text-muted mt-3">
                تصفح مجموعتنا الكاملة من الدورات المصممة لمساعدتك على إتقان فن التصميم الجرافيكي.
            </p>
        </div>

        <!-- Courses Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse ($courses as $course)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden transition-hover">
                        <a href="{{ route('courses.show', $course->slug) }}">
                            <img class="card-img-top" 
                                 style="height: 220px; object-fit: cover;" 
                                 src="{{ $course->image ? Storage::url($course->image) : asset('theme/assets/img/logo.png') }}" 
                                 alt="{{ $course->title }}">
                        </a>
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold mb-3">
                                <a href="{{ route('courses.show', $course->slug) }}" class="text-dark text-decoration-none hover-primary">
                                    {{ $course->title }}
                                </a>
                            </h5>
                            <p class="card-text text-muted mb-4 flex-grow-1">
                                {{ Str::limit($course->description, 120) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-auto">
                                <a href="{{ route('courses.show', $course->slug) }}" class="fw-bold text-decoration-none text-primary">
                                    عرض التفاصيل
                                    <i class="fas fa-arrow-left ms-1"></i>
                                </a>
                                <span class="text-muted small">
                                    <i class="fas fa-user-tie me-1"></i>
                                    {{ $course->instructor->first_name ?? '' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                        <div>
                            لا توجد دورات متاحة حالياً.
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $courses->links() }}
        </div>

    </div>
</div>

<style>
    .transition-hover {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
    }
    .hover-primary:hover {
        color: #0d6efd !important; /* Bootstrap primary color or your theme color */
    }
</style>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush
