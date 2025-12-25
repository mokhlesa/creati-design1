@extends('layouts.public')

@section('content')
    <div class="container py-16">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">نتائج البحث عن: "{{ $query }}"</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <p class="text-gray-700 leading-relaxed">{{ $results }}</p>
        </div>

        {{-- You can add more sections here for related articles or FAQs in the future --}}
    </div>
@endsection
