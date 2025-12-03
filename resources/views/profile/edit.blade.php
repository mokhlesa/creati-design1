<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('الملف الشخصي') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- User Card -->
                <div class="md:col-span-1">
                    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                        <img class="w-32 h-32 rounded-full mx-auto mb-4" src="https://via.placeholder.com/150" alt="User Avatar">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ Auth::user()->name }}</h3>
                        <p class="text-gray-600 dark:text-gray-400">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <!-- Profile Forms with Tabs -->
                <div class="md:col-span-2">
                    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        <div class="p-4 sm:p-8">
                            <div x-data="{ tab: 'profile' }">
                                <div class="border-b border-gray-200 dark:border-gray-700">
                                    <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                                        <button @click="tab = 'profile'"
                                            :class="{'border-indigo-500 text-indigo-600': tab === 'profile', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'profile'}"
                                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                            {{ __('تعديل الملف الشخصي') }}
                                        </button>

                                        <button @click="tab = 'password'"
                                            :class="{'border-indigo-500 text-indigo-600': tab === 'password', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'password'}"
                                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                            {{ __('تغيير كلمة المرور') }}
                                        </button>

                                        <button @click="tab = 'delete'"
                                            :class="{'border-indigo-500 text-indigo-600': tab === 'delete', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': tab !== 'delete'}"
                                            class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                                            {{ __('حذف الحساب') }}
                                        </button>
                                    </nav>
                                </div>

                                <div class="mt-6">
                                    <div x-show="tab === 'profile'">
                                        @include('profile.partials.update-profile-information-form')
                                    </div>

                                    <div x-show="tab === 'password'">
                                        @include('profile.partials.update-password-form')
                                    </div>

                                    <div x-show="tab === 'delete'">
                                        @include('profile.partials.delete-user-form')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>