@extends('admin.layouts.app')

@section('content')
    <h1>{{ __('Social Links') }}</h1>
    <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary">{{ __('Add New Social Link') }}</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>URL</th>
                <th>{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($socialLinks as $socialLink)
                <tr>
                    <td>{{ __('Name') }}</td>
                    <td>{{ __('URL') }}</td>
                    <td>
                        <a href="{{ route('admin.social-links.edit', $socialLink) }}" class="btn btn-secondary">{{ __('Edit') }}</a>
                        <form action="{{ route('admin.social-links.destroy', $socialLink) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
