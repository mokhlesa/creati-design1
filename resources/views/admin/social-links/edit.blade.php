@extends('layouts.admin')

@section('content')
    <h1>Edit Social Link</h1>
    <form action="{{ route('admin.social-links.update', $socialLink) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $socialLink->name }}" required>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ $socialLink->url }}" required>
        </div>
        <div class="form-group">
            <label for="icon">Icon</label>
            <input type="file" name="icon" id="icon" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
