@extends('layouts.public')

@section('content')
<div class="py-5" style="margin-top: 5rem;">
    <div class="container">
        
        <!-- Header & Search -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold text-dark mb-3">كيف يمكننا مساعدتك؟</h1>
            <p class="lead text-muted mb-4">ابحث في قاعدة المعرفة أو تصفح الأسئلة الشائعة</p>
            
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <form action="{{ route('help.search') }}" method="GET" class="position-relative">
                        <div class="input-group input-group-lg shadow-sm">
                            <input type="text" name="q" class="form-control border-0 rounded-pill ps-5 py-3" placeholder="اكتب سؤالك هنا..." aria-label="Search" required>
                            <button class="btn btn-primary rounded-pill px-4 position-absolute top-0 end-0 h-100" type="submit" style="z-index: 5; border-top-right-radius: 50rem!important; border-bottom-right-radius: 50rem!important; border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- FAQ Categories -->
        <div class="row g-4 py-4">
            <!-- Category 1: Account & Registration -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                    <div class="card-body">
                        <div class="mb-3 text-primary">
                            <i class="fas fa-user-circle fa-3x"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">الحساب والتسجيل</h4>
                        <ul class="list-unstyled text-start mb-0">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>كيف أنشئ حساباً جديداً؟</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>نسيت كلمة المرور</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>تغيير البريد الإلكتروني</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Category 2: Courses & Learning -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                    <div class="card-body">
                        <div class="mb-3 text-success">
                            <i class="fas fa-graduation-cap fa-3x"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">الدورات والتعلم</h4>
                        <ul class="list-unstyled text-start mb-0">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>كيف أشترك في دورة؟</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>أين أجد دوراتي المسجلة؟</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>الحصول على الشهادة</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Category 3: AI Consultation -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                    <div class="card-body">
                        <div class="mb-3 text-info">
                            <i class="fas fa-robot fa-3x"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">استشارات الذكاء الاصطناعي</h4>
                        <ul class="list-unstyled text-start mb-0">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>كيف يعمل تقييم الـ AI؟</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>شراء رصيد للاستشارات</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>فهم التقرير التحليلي</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
             <!-- Category 4: Payments -->
             <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                    <div class="card-body">
                        <div class="mb-3 text-warning">
                            <i class="fas fa-credit-card fa-3x"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">المدفوعات والاشتراكات</h4>
                        <ul class="list-unstyled text-start mb-0">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>طرق الدفع المقبولة</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>سياسة الاسترجاع</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>تاريخ الفواتير</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Category 5: Technical Support -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                    <div class="card-body">
                        <div class="mb-3 text-danger">
                            <i class="fas fa-tools fa-3x"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">الدعم الفني</h4>
                        <ul class="list-unstyled text-start mb-0">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>مشكلة في تشغيل الفيديو</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>التطبيق لا يعمل</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>الإبلاغ عن خطأ</a></li>
                        </ul>
                    </div>
                </div>
            </div>

             <!-- Category 6: Community -->
             <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                    <div class="card-body">
                        <div class="mb-3 text-secondary">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <h4 class="card-title fw-bold mb-3">المجتمع والمشاركات</h4>
                        <ul class="list-unstyled text-start mb-0">
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>نشر أعمالي في المعرض</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>قواعد السلوك</a></li>
                            <li class="mb-2"><a href="#" class="text-decoration-none text-muted hover-link"><i class="fas fa-angle-left ms-2 small"></i>التفاعل مع المعلمين</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- Contact Section -->
        <div class="bg-light rounded-3 p-5 mt-5 text-center">
            <h3 class="fw-bold mb-3">لم تجد إجابة لسؤالك؟</h3>
            <p class="text-muted mb-4">فريق الدعم لدينا جاهز لمساعدتك في أي وقت.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg rounded-pill shadow-sm px-5">
                    <i class="fas fa-envelope me-2"></i> تواصل معنا
                </a>
                <a href="#" class="btn btn-outline-dark btn-lg rounded-pill shadow-sm px-5">
                    <i class="fab fa-whatsapp me-2"></i> محادثة مباشرة
                </a>
            </div>
        </div>

    </div>
</div>

<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }
    .hover-link:hover {
        color: var(--bs-primary) !important;
        text-decoration: underline !important;
    }
</style>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush