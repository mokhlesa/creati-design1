@extends('layouts.admin')

@section('content')
    <h1>Portfolio</h1>
    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">Add New Portfolio Item</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($portfolios as $portfolio)
                <tr>
                    <td>{{ $portfolio->title }}</td>
                    <td>{{ $portfolio->description }}</td>
                    <td>
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" style="display: inline-block;">
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
