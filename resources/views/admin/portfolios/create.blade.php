@extends('layouts.admin')

@section('content')
    <h1>Create Portfolio Item</h1>
    <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="main_image">Main Image</label>
            <input type="file" name="main_image" id="main_image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
