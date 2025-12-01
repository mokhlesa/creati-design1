@extends('teacher.layouts.app')

@section('title', 'لوحة تحكم المعلم')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">لوحة تحكم المعلم</h1>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">أهلاً بك!</h6>
                </div>
                <div class="card-body">
                    أهلاً بك في لوحة تحكم المعلم! من هنا يمكنك إدارة دوراتك ودروسك.
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Courses & Lessons Section -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">دوراتي ودروسي</h6>
                </div>
                <div class="card-body">
                    @forelse ($courses as $course)
                        <div class="mb-3">
                            <h5><a href="{{ route('teacher.courses.show', $course->id) }}">{{ $course->title }}</a></h5>
                            @if ($course->lessons->count() > 0)
                                <ul class="list-group list-group-flush">
                                    @foreach ($course->lessons as $lesson)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            {{ $lesson->title }}
                                            <a href="{{ route('teacher.lessons.edit', $lesson->id) }}" class="btn btn-sm btn-info">تعديل الدرس</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted">لا توجد دروس لهذه الدورة بعد.</p>
                            @endif
                        </div>
                    @empty
                        <p class="text-muted">لم تقم بإنشاء أي دورات بعد.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Posts Section -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">مقالاتي</h6>
                </div>
                <div class="card-body">
                    @forelse ($posts as $post)
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <div>
                                <h5 class="mb-1">{{ $post->title }}</h5>
                                <p class="text-muted mb-0">{{ Str::limit($post->content, 100) }}</p>
                            </div>
                            <div>
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-info">تعديل</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">لم تقم بإنشاء أي مقالات بعد.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
