@extends('layouts.public')

@section('content')
<div class="py-5" style="margin-top: 5rem;">
    <!-- Hero Section -->
    <div class="container text-center mb-5 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <span class="badge bg-soft-primary text-primary rounded-pill px-3 py-2 mb-3 fw-bold">لماذا تختارنا؟</span>
                <h1 class="display-4 fw-bold text-dark mb-4">
                    أدوات وميزات مصممة لتطلق العنان <span class="text-primary">لإبداعك</span>
                </h1>
                <p class="lead text-muted mb-4">
                    نجمع بين قوة التعليم الأكاديمي وذكاء التكنولوجيا الحديثة لنقدم لك تجربة تعليمية فريدة من نوعها في عالم التصميم.
                </p>
            </div>
        </div>
    </div>

    <!-- Main Features -->
    <div class="container">
        <!-- Feature 1 -->
        <div class="row align-items-center mb-5 pb-5">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                <div class="position-relative">
                    <div class="bg-primary opacity-10 position-absolute w-100 h-100 rounded-circle" style="top: -20px; right: -20px; z-index: -1;"></div>
                    <img src="{{ asset('theme/assets/img/gallery/1.png') }}" class="img-fluid rounded-3 shadow-lg" alt="دورات تفاعلية" onerror="this.src='https://via.placeholder.com/600x400/e9ecef/adb5bd?text=Interactive+Courses'">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="pe-lg-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    </div>
                    <h2 class="fw-bold mb-3">دورات تدريبية تفاعلية</h2>
                    <p class="text-muted lead">تعلم من أفضل الخبراء في المجال من خلال محتوى فيديو عالي الجودة، وتمارين عملية، واختبارات تفاعلية تضمن فهمك العميق للمادة.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> وصول مدى الحياة للمحتوى</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> شهادات إتمام معتمدة</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> ملفات وموارد قابلة للتحميل</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="row align-items-center mb-5 pb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="position-relative">
                    <div class="bg-info opacity-10 position-absolute w-100 h-100 rounded-circle" style="top: 20px; left: -20px; z-index: -1;"></div>
                    <img src="{{ asset('theme/assets/img/gallery/2.png') }}" class="img-fluid rounded-3 shadow-lg" alt="تقييم الذكاء الاصطناعي" onerror="this.src='https://via.placeholder.com/600x400/e9ecef/adb5bd?text=AI+Assessment'">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ps-lg-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-info text-white rounded-circle mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-brain fa-2x"></i>
                    </div>
                    <h2 class="fw-bold mb-3">مقيم التصميم بالذكاء الاصطناعي</h2>
                    <p class="text-muted lead">احصل على تغذية راجعة فورية ودقيقة على تصميماتك. خوارزمياتنا الذكية تحلل التوازن، الألوان، والخطوط لتعطيك نصائح لتحسين عملك.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-info me-2"></i> تحليل فوري خلال ثوانٍ</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-info me-2"></i> اقتراحات عملية للتحسين</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-info me-2"></i> مقارنة مع معايير الصناعة</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="row align-items-center mb-5 pb-5">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                <div class="position-relative">
                    <div class="bg-warning opacity-10 position-absolute w-100 h-100 rounded-circle" style="top: -20px; right: -20px; z-index: -1;"></div>
                    <img src="{{ asset('theme/assets/img/gallery/3.png') }}" class="img-fluid rounded-3 shadow-lg" alt="مجتمع المبدعين" onerror="this.src='https://via.placeholder.com/600x400/e9ecef/adb5bd?text=Creative+Community'">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <div class="pe-lg-5">
                    <div class="d-inline-flex align-items-center justify-content-center bg-warning text-white rounded-circle mb-3" style="width: 60px; height: 60px;">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h2 class="fw-bold mb-3">مجتمع نابض بالحياة</h2>
                    <p class="text-muted lead">انضم إلى مجتمع من المصممين الطموحين والمحترفين. شارك أعمالك في المعرض، تبادل الخبرات، وابنِ شبكة علاقات قوية.</p>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i> معرض أعمال للطلاب</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i> منتديات للنقاش والمساعدة</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-warning me-2"></i> فرص للتعاون في مشاريع</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Features Grid -->
    <div class="bg-light py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">والمزيد من الميزات الرائعة</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="text-primary mb-3"><i class="fas fa-laptop-code fa-2x"></i></div>
                        <h5 class="fw-bold">تعلم من أي مكان</h5>
                        <p class="text-muted small">منصتنا متوافقة مع جميع الأجهزة لتعلم مريح.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="text-primary mb-3"><i class="fas fa-clock fa-2x"></i></div>
                        <h5 class="fw-bold">تعلم بسرعتك</h5>
                        <p class="text-muted small">لا جداول زمنية صارمة، تعلم وقتما تشاء.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="text-primary mb-3"><i class="fas fa-project-diagram fa-2x"></i></div>
                        <h5 class="fw-bold">مشاريع عملية</h5>
                        <p class="text-muted small">طبق ما تعلمته من خلال مشاريع حقيقية.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card h-100 border-0 shadow-sm text-center p-4">
                        <div class="text-primary mb-3"><i class="fas fa-headset fa-2x"></i></div>
                        <h5 class="fw-bold">دعم مستمر</h5>
                        <p class="text-muted small">فريقنا جاهز لمساعدتك في أي عقبة تواجهها.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="container mt-5">
        <div class="bg-primary rounded-3 p-5 text-center text-white position-relative overflow-hidden">
            <div class="position-relative z-index-1">
                <h2 class="fw-bold mb-4">جاهز لبدء رحلتك التعليمية؟</h2>
                <p class="lead mb-4">انضم إلى آلاف الطلاب الذين يطورون مهاراتهم معنا اليوم.</p>
                <a href="{{ route('register') }}" class="btn btn-light btn-lg rounded-pill fw-bold px-5 text-primary">سجل مجاناً الآن</a>
            </div>
            <!-- Decorative circles -->
            <div class="position-absolute rounded-circle bg-white opacity-10" style="width: 300px; height: 300px; top: -100px; right: -100px;"></div>
            <div class="position-absolute rounded-circle bg-white opacity-10" style="width: 200px; height: 200px; bottom: -50px; left: -50px;"></div>
        </div>
    </div>
</div>

<style>
    .bg-soft-primary {
        background-color: rgba(13, 110, 253, 0.1);
    }
</style>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush