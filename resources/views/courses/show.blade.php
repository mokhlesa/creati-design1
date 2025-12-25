@extends('layouts.public')

@section('title', $course->title)

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h1 class="card-title fw-bold">{{ $course->title }}</h1>
                        <p class="text-muted">بواسطة {{ $course->instructor->first_name }} {{ $course->instructor->last_name }}</p>
                        <hr>
                        
                        @if($course->intro_video_url)
                            <div class="mb-4">
                                <h5 class="fw-bold">فيديو تعريفي</h5>
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ str_replace('watch?v=', 'embed/', $course->intro_video_url) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endif

                        <h5 class="fw-bold">وصف الدورة</h5>
                        <p>{{ $course->description }}</p>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-body">
                        @if($isEnrolled)
                        <h5 class="fw-bold mb-2">تقدمك</h5>
                        <div class="progress mb-4" style="height: 20px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ round($progressPercentage) }}%;" aria-valuenow="{{ round($progressPercentage) }}" aria-valuemin="0" aria-valuemax="100">
                                {{ round($progressPercentage) }}%
                            </div>
                        </div>
                        @endif

                        <h5 class="fw-bold mb-3">محتويات الدورة ({{ $course->lessons->count() }} جلسات)</h5>
                        <div class="list-group list-group-flush">
                            @foreach($course->lessons as $lesson)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        @if(in_array($lesson->id, $completedLessons))
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                        @endif
                                        {{ $lesson->title }}
                                    </span>
                                    @if($isEnrolled)
                                        <a href="{{ route('lessons.show', ['course' => $course->slug, 'lesson' => $lesson->slug]) }}" class="btn btn-sm btn-outline-primary">عرض الدرس</a>
                                    @else
                                        <i class="fas fa-lock text-muted"></i>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm position-sticky" style="top: 8rem;">
                    <img src="{{ $course->image ? Storage::url($course->image) : 'https://via.placeholder.com/800x600.png/007bff/ffffff?text=Course+Image' }}" class="card-img-top" alt="{{ $course->title }}">
                    <div class="card-body text-center">
                        @if(!$isEnrolled)
                        <h3 class="card-title fw-bold">
                            {{ $course->price > 0 ? '$' . $course->price : 'مجاناً' }}
                        </h3>
                        @endif
                        
                        @if($isEnrolled)
                            @if($nextLessonUrl)
                                <a href="{{ $nextLessonUrl }}" class="btn btn-success btn-lg w-100">الدرس التالي</a>
                            @else
                                <span class="btn btn-secondary btn-lg w-100 disabled">اكتملت الدورة</span>
                            @endif
                        @else
                            @auth
                            <form action="{{ route('courses.enroll') }}" method="POST">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-info btn-lg w-100 rounded-pill shadow fw-bold">
                                    {{ $course->price > 0 ? 'اشترك الآن' : 'سجل مجاناً' }}
                                </button>
                            </form>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-info btn-lg w-100 rounded-pill shadow fw-bold">
                                    {{ $course->price > 0 ? 'اشترك الآن' : 'سجل مجاناً' }}
                                </a>
                                <p class="mt-2 text-muted small">يجب عليك تسجيل الدخول أولاً</p>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush