@extends('layouts.public')

@section('title', $lesson->title)

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h1 class="card-title fw-bold">{{ $lesson->title }}</h1>
                        <p class="text-muted">من دورة: <a href="{{ route('courses.show', $course->slug) }}">{{ $course->title }}</a></p>
                        <hr>
                        
                        @if($lesson->video_url)
                            <div class="mb-4">
                                <div class="ratio ratio-16x9">
                                    <iframe src="{{ str_replace('watch?v=', 'embed/', $lesson->video_url) }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endif

                        <div class="lesson-content">
                            {!! $lesson->content !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm position-sticky" style="top: 8rem;">
                    <div class="card-body">
                        <h5 class="fw-bold mb-2">تقدمك في الدورة</h5>
                        <div class="progress mb-4" style="height: 20px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ round($progressPercentage) }}%;" aria-valuenow="{{ round($progressPercentage) }}" aria-valuemin="0" aria-valuemax="100">
                                {{ round($progressPercentage) }}%
                            </div>
                        </div>

                        @if($nextLessonUrl)
                            <a href="{{ $nextLessonUrl }}" class="btn btn-success btn-lg w-100">الدرس التالي</a>
                        @else
                            <span class="btn btn-secondary btn-lg w-100 disabled">اكتملت الدورة</span>
                        @endif
                        
                        <hr>

                        <h5 class="fw-bold mb-3 mt-4">دروس الدورة</h5>
                        <div class="list-group list-group-flush" style="max-height: 50vh; overflow-y: auto;">
                            @foreach($course->lessons()->orderBy('order')->get() as $l)
                            <a href="{{ route('lessons.show', ['course' => $course->slug, 'lesson' => $l->slug]) }}" 
                               class="list-group-item list-group-item-action d-flex align-items-center {{ $l->id === $lesson->id ? 'active' : '' }}">
                                @if(in_array($l->id, $completedLessons))
                                    <i class="fas fa-check-circle text-success me-2"></i>
                                @else
                                    <i class="far fa-circle text-muted me-2"></i>
                                @endif
                                <span class="text-truncate">{{ $l->title }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .lesson-content h1, .lesson-content h2, .lesson-content h3 {
        margin-top: 1.5em;
        margin-bottom: 0.5em;
        font-weight: bold;
    }
    .lesson-content p {
        line-height: 1.8;
    }
    .lesson-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin-top: 1em;
        margin-bottom: 1em;
    }
</style>
@endpush
