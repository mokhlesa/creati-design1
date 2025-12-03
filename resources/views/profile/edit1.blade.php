<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('الملف الشخصي') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

                <!-- User Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg text-center p-6">
                        <div class="relative inline-block">
                            <img class="w-32 h-32 rounded-full mx-auto mb-4 border-4 border-gray-200 dark:border-gray-700"
                                src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}"
                                alt="User Avatar">
                            <button
                                class="absolute bottom-0 right-0 bg-indigo-600 hover:bg-indigo-700 text-white p-2 rounded-full shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</h3>
                        <p class="text-gray-500 dark:text-gray-400 mt-1">{{ Auth::user()->email }}</p>
                        <div class="mt-4">
                            <span
                                class="inline-block bg-indigo-100 text-indigo-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full dark:bg-indigo-900 dark:text-indigo-300">
                                {{ Auth::user()->role->name ?? 'طالب' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Profile Forms with Tabs -->
                <div class="lg:col-span-3">
                    <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg">
                        <div x-data="{ tab: 'profile' }">
                            <div class="px-4 sm:px-8 pt-4">
                                <div class="border-b border-gray-200 dark:border-gray-700">
                                    <nav class="-mb-px flex space-x-6" aria-label="Tabs">
                                        <button @click="tab = 'profile'"
                                            :class="{'border-indigo-500 text-indigo-600': tab === 'profile', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-200': tab !== 'profile'}"
                                            class="whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm focus:outline-none transition-colors duration-150 ease-in-out">
                                            {{ __('تعديل الملف الشخصي') }}
                                        </button>

                                        <button @click="tab = 'password'"
                                            :class="{'border-indigo-500 text-indigo-600': tab === 'password', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-200': tab !== 'password'}"
                                            class="whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm focus:outline-none transition-colors duration-150 ease-in-out">
                                            {{ __('تغيير كلمة المرور') }}
                                        </button>

                                        <button @click="tab = 'delete'"
                                            :class="{'border-red-500 text-red-600': tab === 'delete', 'border-transparent text-gray-500 hover:text-red-700 hover:border-red-300 dark:text-gray-400 dark:hover:text-red-500': tab !== 'delete'}"
                                            class="whitespace-nowrap pb-4 px-1 border-b-2 font-medium text-sm focus:outline-none transition-colors duration-150 ease-in-out">
                                            {{ __('حذف الحساب') }}
                                        </button>
                                    </nav>
                                </div>
                            </div>

                            <div class="p-6 sm:p-8">
                                <div x-show.transition.in.opacity.duration.600ms="tab === 'profile'">
                                    @include('profile.partials.update-profile-information-form')
                                </div>

                                <div x-show.transition.in.opacity.duration.600ms="tab === 'password'">
                                    @include('profile.partials.update-password-form')
                                </div>

                                <div x-show.transition.in.opacity.duration.600ms="tab === 'delete'">
                                    @include('profile.partials.delete-user-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
