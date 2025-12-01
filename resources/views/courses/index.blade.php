@extends('layouts.public')

@section('content')
<div class="bg-gray-50 py-12" style="margin-top: 5rem;">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Page Header -->
        <div class="max-w-3xl mx-auto text-center pb-12">
            <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl">
                جميع الدورات
            </h1>
            <p class="mt-4 text-xl text-gray-600">
                تصفح مجموعتنا الكاملة من الدورات المصممة لمساعدتك على إتقان فن التصميم الجرافيكي.
            </p>
        </div>

        <!-- Courses Grid -->
        <div class="grid gap-8 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            @forelse ($courses as $course)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform transform hover:-translate-y-2">
                    <a href="{{ route('courses.show', $course->slug) }}">
                        <img class="h-56 w-full object-cover" src="{{ $course->thumbnail_url ? Storage::url($course->thumbnail_url) : 'https://via.placeholder.com/400x225/E0E7FF/4F46E5?text=' . urlencode($course->title) }}" alt="{{ $course->title }}">
                    </a>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-2">
                            <a href="{{ route('courses.show', $course->slug) }}" class="hover:text-indigo-700 transition-colors">
                                {{ $course->title }}
                            </a>
                        </h3>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            {{ Str::limit($course->description, 120) }}
                        </p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('courses.show', $course->slug) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold text-lg">
                                عرض التفاصيل
                                <span aria-hidden="true">&rarr;</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.21 3.03-1.742 3.03H4.42c-1.532 0-2.492-1.696-1.742-3.03l5.58-9.92zM10 13a1 1 0 110-2 1 1 0 010 2zm-1-8a1 1 0 00-1 1v3a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    لا توجد دورات متاحة حالياً.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $courses->links() }}
        </div>

    </div>
</div>
@endsection