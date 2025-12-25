@extends('admin.layouts.app')

@section('content')
    <h1>Edit Social Link</h1>
    <form action="{{ route('admin.social-links.update', $socialLink) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <select name="name" id="name" class="form-control" required>
                <option value="Facebook" {{ $socialLink->name == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                <option value="Twitter" {{ $socialLink->name == 'Twitter' ? 'selected' : '' }}>Twitter (X)</option>
                <option value="Instagram" {{ $socialLink->name == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                <option value="Pinterest" {{ $socialLink->name == 'Pinterest' ? 'selected' : '' }}>Pinterest</option>
                <option value="WhatsApp" {{ $socialLink->name == 'WhatsApp' ? 'selected' : '' }}>WhatsApp</option>
            </select>
        </div>
        <div class="form-group">
            <label for="url">URL</label>
            <input type="url" name="url" id="url" class="form-control" value="{{ $socialLink->url }}" required>
        </div>
        <div class="form-group">
            <label for="icon">Icon (Optional - Default will be used)</label>
            <input type="file" name="icon" id="icon" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
