@extends('admin.layouts.app')

@section('title', 'إضافة دور جديد')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">نموذج إضافة دور</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">اسم الدور</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="مثال: admin, student" required>
                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <button type="submit" class="btn btn-primary">حفظ</button>
            <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">إلغاء</a>
        </form>
    </div>
</div>
@endsection