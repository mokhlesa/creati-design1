@extends('layouts.public')

@section('content')
    <div class="container">
        <h1>{{ $portfolio->title }}</h1>
        <p>{{ $portfolio->description }}</p>
        <img src="{{ $portfolio->main_image }}" class="img-fluid" alt="{{ $portfolio->title }}">
        <hr>
        <h3>Media</h3>
        <div class="row">
            @foreach ($portfolio->media as $media)
                <div class="col-md-4">
                    @if ($media->type == 'image')
                        <img src="{{ $media->url }}" class="img-fluid" alt="Portfolio Image">
                    @else
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/{{ basename(parse_url($media->url, PHP_URL_PATH)) }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
