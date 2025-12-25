@extends('layouts.public')

@section('content')
    <div class="container mx-auto px-4 py-16">
        <h1 class="text-4xl font-extrabold text-center mb-8">كيف يمكننا المساعدة؟</h1>

        <div class="max-w-2xl mx-auto relative">
    <form action="{{ route('help.search') }}" method="GET" class="relative bg-white rounded-full shadow-md p-2 focus-within:ring-2 focus-within:ring-blue-500">
        <input 
            type="text" 
            name="q" 
            placeholder="اكتب سؤالك هنا..." 
            class="w-full py-4 pl-12 pr-6 rounded-full text-gray-900 focus:outline-none" 
            minlength="3" 
            required
        >
        <button 
            type="submit" 
            class="absolute right-2 top-0 bottom-0 p-3 flex items-center justify-center focus:outline-none"
        >
            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
    </form>
</div>
    </div>
@endsection

