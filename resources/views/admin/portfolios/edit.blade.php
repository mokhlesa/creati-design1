@extends('layouts.admin')

@section('content')
    <h1>Edit Portfolio Item</h1>
    <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $portfolio->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $portfolio->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="main_image">Main Image</label>
            <input type="file" name="main_image" id="main_image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
