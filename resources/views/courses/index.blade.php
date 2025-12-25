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

        <!-- Courses List -->
        <div class="max-w-4xl mx-auto space-y-4">
            @forelse ($courses as $course)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 hover:shadow-md transition-shadow duration-300">
                    <div class="flex flex-row items-center gap-6">
                        <!-- Small Image -->
                        <div class="w-32 h-24 sm:w-40 sm:h-28 flex-shrink-0 overflow-hidden rounded-lg shadow-sm">
                            <a href="{{ route('courses.show', $course->slug) }}">
                                <img 
                                    class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500" 
                                    src="{{ $course->image ? Storage::url($course->image) : 'https://via.placeholder.com/400x300/E0E7FF/4F46E5?text=' . urlencode($course->title) }}" 
                                    alt="{{ $course->title }}"
                                >
                            </a>
                        </div>

                        <!-- Content Next to Image -->
                        <div class="flex-grow">
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                                <h3 class="text-xl font-bold text-gray-900">
                                    <a href="{{ route('courses.show', $course->slug) }}" class="hover:text-indigo-600 transition-colors">
                                        {{ $course->title }}
                                    </a>
                                </h3>
                                <div class="text-lg font-bold text-indigo-600">
                                    {{ $course->price > 0 ? $course->price . ' $' : 'مجاناً' }}
                                </div>
                            </div>
                            
                            <p class="text-gray-600 text-sm mb-4 line-clamp-1 hidden sm:block">
                                {{ Str::limit($course->description, 120) }}
                            </p>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4 text-xs text-gray-500">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                        {{ $course->instructor->first_name ?? 'المعلم' }}
                                    </span>
                                    <span class="bg-indigo-50 text-indigo-700 px-2 py-0.5 rounded font-medium">
                                        {{ $course->category->name ?? 'دورة' }}
                                    </span>
                                </div>
                                <a href="{{ route('courses.show', $course->slug) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold flex items-center group">
                                    عرض التفاصيل
                                    <svg class="w-4 h-4 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-12 bg-white rounded-xl shadow-sm border border-gray-100">
                    <p class="text-gray-500">لا توجد دورات متاحة حالياً.</p>
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