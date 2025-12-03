@extends('layouts.admin')

@section('content')
    <h1>Social Links</h1>
    <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary">Add New Social Link</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($socialLinks as $socialLink)
                <tr>
                    <td>{{ $socialLink->name }}</td>
                    <td>{{ $socialLink->url }}</td>
                    <td>
                        <a href="{{ route('admin.social-links.edit', $socialLink) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('admin.social-links.destroy', $socialLink) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
