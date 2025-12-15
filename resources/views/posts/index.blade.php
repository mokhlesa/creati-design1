@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container" style="margin-top: 2rem;">
        
        <div class="text-center mb-5">
            <h1 class="fw-bold display-5">مقالات التصميم</h1>
            <p class="lead text-muted">اكتشف أحدث الأفكار والنصائح من خبرائنا</p>
        </div>

        <div class="row g-4">
            @forelse ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <!-- Post Unit -->
                    <div class="post-unit h-100 d-flex flex-column">
                        
                        <!-- Author Info (Outside & Above the Box) -->
                        <div class="d-flex align-items-center mb-2 px-1">
                            <div class="flex-shrink-0">
                                @if($post->user && $post->user->profile_image_url)
                                     <img class="rounded-circle shadow-sm border border-2 border-white" 
                                          src="{{ Str::startsWith($post->user->profile_image_url, ['http', 'https']) ? $post->user->profile_image_url : Storage::url($post->user->profile_image_url) }}" 
                                          alt="{{ $post->user->name }}" width="45" height="45" style="object-fit: cover;">
                                @else
                                    <div class="rounded-circle bg-white text-secondary d-flex align-items-center justify-content-center shadow-sm border" style="width: 45px; height: 45px;">
                                        <span class="fw-bold fs-5">{{ strtoupper(substr($post->user->name ?? 'U', 0, 1)) }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="me-2">
                                <h6 class="mb-0 fw-bold text-dark fs--1">{{ $post->user->name ?? 'مستخدم' }}</h6>
                                <small class="text-muted fs--2" dir="ltr">{{ $post->published_at ? $post->published_at->format('M d, Y') : '' }}</small>
                            </div>
                        </div>

                        <!-- The Content Box -->
                        @php
                            // Theme-consistent soft colors/gradients
                            $themes = [
                                ['bg' => 'linear-gradient(135deg, #fdfbfd 0%, #f3effc 100%)', 'border' => '#e8e0f5', 'icon_color' => '#9C69E2'], // Soft Purple
                                ['bg' => 'linear-gradient(135deg, #fffcfc 0%, #fff0f0 100%)', 'border' => '#fadcd9', 'icon_color' => '#F53838'], // Soft Red
                                ['bg' => 'linear-gradient(135deg, #fcfefe 0%, #eefbfd 100%)', 'border' => '#dff6f9', 'icon_color' => '#3EC1D5'], // Soft Cyan
                            ];
                            $theme = $themes[$loop->index % count($themes)];
                        @endphp

                        <div class="card shadow-sm border-0 rounded-3 overflow-hidden flex-grow-1 transition-hover" 
                             style="background: {{ $theme['bg'] }}; border: 1px solid {{ $theme['border'] }} !important;">
                            
                            {{-- Decorative Header (Optional, subtle bar) --}}
                            <div style="height: 6px; background: {{ $theme['icon_color'] }};"></div>

                            <div class="card-body p-4 d-flex flex-column">
                                <div class="mb-3 d-flex justify-content-between align-items-start">
                                    <span class="badge bg-white text-dark shadow-sm border rounded-pill px-3 py-1 fw-normal">{{ $post->category->name ?? 'عام' }}</span>
                                    {{-- Icon matching the theme --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="{{ $theme['icon_color'] }}" class="bi bi-quote opacity-50" viewBox="0 0 16 16">
                                        <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.277-1.027.141-.418.305-.775.492-1.027.197-.275.433-.483.655-.589.26-.124.474-.15.614-.15.118 0 .193.006.208.01a.5.5 0 1 0 .138-.99c-.046-.013-.178-.041-.397-.041-.482 0-1.056.126-1.57.514-.52.39-1.042 1.05-1.42 2.015-.296.76-.367 1.58-.367 2.186V11a1 1 0 0 0 1 1h2zM7.5 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H6.112c0-.351.021-.703.062-1.054.062-.372.166-.703.277-1.027.141-.418.305-.775.492-1.027.197-.275.433-.483.655-.589.26-.124.474-.15.614-.15.118 0 .193.006.208.01a.5.5 0 1 0 .138-.99c-.046-.013-.178-.041-.397-.041-.482 0-1.056.126-1.57.514-.52.39-1.042 1.05-1.42 2.015-.296.76-.367 1.58-.367 2.186V11a1 1 0 0 0 1 1h2z"/>
                                    </svg>
                                </div>

                                <h4 class="card-title fw-bold mb-3">
                                    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none text-dark stretched-link">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                                
                                <p class="card-text text-secondary lh-lg mb-4 flex-grow-1" style="font-size: 0.95rem;">
                                    {{ Str::limit(strip_tags($post->body), 120) }}
                                </p>

                                <div class="mt-auto pt-3 border-top border-light d-flex justify-content-between align-items-center">
                                    <span class="text-primary fs--1 fw-bold">اقرأ المزيد &larr;</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="text-center py-5">
                        <div class="alert alert-light shadow-sm" role="alert">
                            <h4 class="alert-heading">لا توجد مقالات!</h4>
                            <p>لم يتم نشر أي مقالات حتى الآن. عد لاحقاً للمزيد من المحتوى.</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>

    </div>
</section>

<style>
    .transition-hover {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .transition-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.08)!important;
    }
    .text-justify {
        text-align: justify;
    }
</style>
@endsection