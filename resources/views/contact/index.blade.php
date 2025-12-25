@extends('layouts.public')

@section('content')
<div class="py-5" style="margin-top: 5rem;">
    <div class="container">
        
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-dark mb-3">تواصل معنا</h1>
            <p class="lead text-muted mb-4">نحن هنا للإجابة على استفساراتك ومساعدتك في رحلتك التعليمية</p>
        </div>

        <div class="row g-5">
            <!-- Contact Info -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm h-100 bg-primary text-white">
                    <div class="card-body p-5">
                        <h3 class="fw-bold mb-4">بيانات التواصل</h3>
                        <p class="mb-5 opacity-75">لا تتردد في الاتصال بنا عبر أي من القنوات التالية. فريقنا متاح خلال ساعات العمل الرسمية.</p>

                        <div class="d-flex align-items-start mb-4">
                            <div class="me-3 mt-1">
                                <i class="fas fa-map-marker-alt fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">العنوان</h5>
                                <p class="mb-0 opacity-75">{!! $settings['contact_address']->value ?? 'الرياض، المملكة العربية السعودية' !!}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="me-3 mt-1">
                                <i class="fas fa-envelope fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">البريد الإلكتروني</h5>
                                <p class="mb-0 opacity-75">{{ $settings['contact_email']->value ?? 'support@example.com' }}</p>
                            </div>
                        </div>

                        <div class="d-flex align-items-start mb-4">
                            <div class="me-3 mt-1">
                                <i class="fas fa-phone-alt fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-1">الهاتف</h5>
                                <p class="mb-0 opacity-75">{{ $settings['contact_phone']->value ?? '+966 12 345 6789' }}</p>
                            </div>
                        </div>

                        <div class="mt-5">
                            <h5 class="fw-bold mb-3">تابعنا على</h5>
                            <div class="d-flex gap-3">
                                <a href="#" class="text-white hover-opacity"><i class="fab fa-twitter fa-lg"></i></a>
                                <a href="#" class="text-white hover-opacity"><i class="fab fa-facebook fa-lg"></i></a>
                                <a href="#" class="text-white hover-opacity"><i class="fab fa-instagram fa-lg"></i></a>
                                <a href="#" class="text-white hover-opacity"><i class="fab fa-linkedin fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <h3 class="fw-bold mb-4">أرسل لنا رسالة</h3>
                        <form action="#" method="POST"> <!-- Logic to be implemented -->
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">الاسم الكامل</label>
                                    <input type="text" class="form-control form-control-lg bg-light border-0" id="name" placeholder="أدخل اسمك" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">البريد الإلكتروني</label>
                                    <input type="email" class="form-control form-control-lg bg-light border-0" id="email" placeholder="name@example.com" required>
                                </div>
                                <div class="col-12">
                                    <label for="subject" class="form-label">الموضوع</label>
                                    <input type="text" class="form-control form-control-lg bg-light border-0" id="subject" placeholder="كيف يمكننا مساعدتك؟" required>
                                </div>
                                <div class="col-12">
                                    <label for="message" class="form-label">الرسالة</label>
                                    <textarea class="form-control form-control-lg bg-light border-0" id="message" rows="5" placeholder="اكتب رسالتك هنا..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill px-5">إرسال الرسالة</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-opacity:hover {
        opacity: 0.8;
    }
    .form-control:focus {
        box-shadow: none;
        border: 1px solid var(--bs-primary) !important;
        background-color: #fff !important;
    }
</style>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush
