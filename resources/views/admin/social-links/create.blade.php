@extends('admin.layouts.app')

@section('content')
    <h1>Create Social Link</h1>
    <form action="{{ route('admin.social-links.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <select name="name" id="name" class="form-control" required>
                <option value="Facebook">Facebook</option>
                <option value="Twitter">Twitter (X)</option>
                <option value="Instagram">Instagram</option>
                <option value="Pinterest">Pinterest</option>
                <option value="WhatsApp">WhatsApp</option>
            </select>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" name="url" id="url" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="icon">Icon (Optional - Default will be used)</label>
            <input type="file" name="icon" id="icon" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
