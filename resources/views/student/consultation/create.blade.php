@extends('student.layouts.app')

@section('title', 'استشارة تصميم بالذكاء الاصطناعي')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">استشارة تصميم بالذكاء الاصطناعي</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('consultation.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="design_file" class="form-label">ملف التصميم</label>
                    <input id="design_file" class="form-control" type="file" name="design_file" required autofocus accept="image/*,video/*,.pdf"/>
                    @error('design_file')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="design_concept" class="form-label">فكرة التصميم</label>
                    <textarea id="design_concept" name="design_concept" rows="6" class="form-control" required>{{ old('design_concept') }}</textarea>
                    @error('design_concept')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        إرسال طلب الاستشارة
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection