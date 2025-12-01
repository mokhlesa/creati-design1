@extends('teacher.layouts.app')

@section('title', 'أعمال الطالب: ' . $student->first_name)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">أعمال الطالب: {{ $student->first_name }} {{ $student->last_name }}</h5>
    </div>
    <div class="card-body">
        @if($showcases->isEmpty())
            <p class="text-center">هذا الطالب لم يقم برفع أي أعمال بعد.</p>
        @else
            <div class="row">
                @foreach($showcases as $showcase)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if($showcase->image_url)
                                <img src="{{ Storage::url($showcase->image_url) }}" class="card-img-top" alt="{{ $showcase->title }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $showcase->title }}</h5>
                                <p class="card-text">{{ $showcase->description }}</p>
                                <a href="{{ $showcase->project_url }}" class="btn btn-primary" target="_blank">عرض المشروع</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-3">{{ $showcases->links() }}</div>
        @endif
        <a href="{{ route('teacher.students.index') }}" class="btn btn-secondary mt-3">العودة إلى قائمة الطلاب</a>
    </div>
</div>
@endsection
