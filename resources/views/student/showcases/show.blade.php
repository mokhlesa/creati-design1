@extends('student.layouts.app')

@section('title', $showcase->title)

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">{{ $showcase->title }}</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if ($showcase->image_url)
                <div class="mb-4">
                    <img src="{{ $showcase->image_url }}" alt="{{ $showcase->title }}" class="img-fluid rounded">
                </div>
            @endif

            <p class="card-text">{!! nl2br(e($showcase->description)) !!}</p>

            @if ($showcase->project_url)
                <div class="mt-4">
                    <a href="{{ $showcase->project_url }}" target="_blank" rel="noopener noreferrer" class="btn btn-primary">
                        <i class="fas fa-external-link-alt me-1"></i> {{ __('View Project') }}
                    </a>
                </div>
            @endif

            <div class="mt-4 border-top pt-3">
                <a href="{{ route('student.showcases.index') }}" class="btn btn-secondary btn-sm">
                    &larr; {{ __('Back to all showcases') }}
                </a>
            </div>
        </div>
    </div>
@endsection
