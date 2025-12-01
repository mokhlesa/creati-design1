@extends('layouts.public')

@section('content')
<div class="bg-gray-50 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8" style="margin-top: 5rem;">
    <div class="max-w-3xl w-full space-y-8">
        <div class="text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
                تقييم التصميم بالذكاء الاصطناعي
            </h1>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
                احصل على تحليل فوري لتصميمك. قم برفع صورتك، صف هدفك، ودع الذكاء الاصطناعي يقدم لك ملاحظات بناءة لمساعدتك على تحسين عملك.
            </p>
        </div>

        <div class="bg-white shadow-xl rounded-2xl p-8 sm:p-12">
            <form action="{{ route('consultation.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <!-- Design Upload -->
                <div>
                    <label for="design_image" class="block text-sm font-medium text-gray-700 sr-only">ارفع تصميمك</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="design_image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>اختر ملفًا</span>
                                    <input id="design_image" name="design_image" type="file" class="sr-only" required>
                                </label>
                                <p class="pl-1">أو اسحبه وأفلته هنا</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Design Goal -->
                <div>
                    <label for="design_goal" class="block text-lg font-semibold text-gray-800 mb-2">صف هدف التصميم</label>
                    <div class="mt-1">
                        <textarea id="design_goal" name="design_goal" rows="4" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="مثال: أحاول تصميم شعار لمتجر قهوة يركز على الطابع العصري والبسيط..." required></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">كلما كان وصفك دقيقاً، كانت الملاحظات أفضل.</p>
                </div>
                
                @auth
                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            احصل على تقييمك الآن
                        </button>
                    </div>
                @else
                    <div class="rounded-md bg-blue-50 p-4">
                      <div class="flex">
                        <div class="flex-shrink-0">
                          <!-- Heroicon name: solid/information-circle -->
                          <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                          </svg>
                        </div>
                        <div class="ml-3 flex-1 md:flex md:justify-between">
                          <p class="text-sm text-blue-700">
                            يرجى <a href="{{ route('login') }}" class="font-medium text-blue-800 hover:text-blue-900">تسجيل الدخول</a> أو <a href="{{ route('register') }}" class="font-medium text-blue-800 hover:text-blue-900">إنشاء حساب</a> لتتمكن من طلب التقييم.
                          </p>
                        </div>
                      </div>
                    </div>
                @endauth
            </form>
        </div>
    </div>
</div>
@endsection