@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="fw-bold mb-4 text-center">{{ __('الملف الشخصي') }}</h1>
                        <div class="row">
                            <!-- User Card -->
                            <div class="col-lg-4 text-center mb-4 mb-lg-0">
                                <div class="p-3 border rounded">
                                    <img class="img-fluid rounded-circle mb-3"
                                        src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&color=7F9CF5&background=EBF4FF' }}"
                                        alt="User Avatar" style="width: 150px; height: 150px;">
                                    <h4 class="fw-bold">{{ Auth::user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::user()->email }}</p>
                                    <span class="badge bg-info text-dark">
                                        {{ Auth::user()->role->name ?? 'طالب' }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Profile Forms with Tabs -->
                            <div class="col-lg-8">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-profile" type="button" role="tab"
                                            aria-controls="pills-profile"
                                            aria-selected="true">{{ __('تعديل الملف الشخصي') }}</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-password-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-password" type="button" role="tab"
                                            aria-controls="pills-password"
                                            aria-selected="false">{{ __('تغيير كلمة المرور') }}</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link text-danger" id="pills-delete-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-delete" type="button" role="tab"
                                            aria-controls="pills-delete"
                                            aria-selected="false">{{ __('حذف الحساب') }}</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-3" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        @include('profile.partials.update-profile-information-form')
                                    </div>
                                    <div class="tab-pane fade" id="pills-password" role="tabpanel"
                                        aria-labelledby="pills-password-tab">
                                        @include('profile.partials.update-password-form')
                                    </div>
                                    <div class="tab-pane fade" id="pills-delete" role="tabpanel"
                                        aria-labelledby="pills-delete-tab">
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
</section>
@endsection
