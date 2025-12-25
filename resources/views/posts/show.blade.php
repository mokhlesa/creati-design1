@extends('layouts.public')

@section('title', $post->title)

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container" data-aos="fade-up">
                    <article class="article card shadow-sm">
                        <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                            <div class="content-header">
                                <h1 class="title">{{ $post->title }}</h1>
                                <div class="author-info">
                                    <div class="post-meta">
                                        <span class="date"><i class="bi bi-calendar3"></i> {{ $post->published_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                {!! $post->content !!}
                            </div>
                        </div>
                    </article>
                </div>
            </section><!-- /Blog Details Section -->
        </div>
    </div>
</div>
@endsection