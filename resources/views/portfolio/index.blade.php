@extends('layouts.public')

@section('content')
    <div class="container">
        <h1>Portfolio</h1>
        <div class="row">
            @foreach ($portfolios as $portfolio)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ Storage::url($portfolio->image_path) }}" class="card-img-top" alt="{{ $portfolio->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $portfolio->title }}</h5>
                            <p class="card-text">{{ $portfolio->description }}</p>
                            <a href="{{ route('portfolio.show', $portfolio) }}" class="btn btn-primary">View</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
