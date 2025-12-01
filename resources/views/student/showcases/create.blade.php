@extends('student.layouts.app')

@section('title', __('Create New Showcase'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">{{ __('Create New Showcase') }}</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('student.showcases.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}" required autofocus />
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">{{ __('Description') }}</label>
                    <textarea id="description" name="description" rows="4" class="form-control" required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image_url" class="form-label">{{ __('Image URL (Optional)') }}</label>
                    <input id="image_url" class="form-control" type="url" name="image_url" value="{{ old('image_url') }}" />
                </div>

                <div class="mb-3">
                    <label for="project_url" class="form-label">{{ __('Project URL (Optional)') }}</label>
                    <input id="project_url" class="form-control" type="url" name="project_url" value="{{ old('project_url') }}" />
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('student.showcases.index') }}" class="btn btn-secondary me-2">
                        {{ __('Cancel') }}
                    </a>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
