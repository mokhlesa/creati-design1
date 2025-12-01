@extends('layouts.public')

@section('content')
<section class="py-6">
    <div class="container" style="margin-top: 5rem;">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="mb-4 fw-bold">مجتمع المصممين</h1>
                <p class="lead text-muted mb-5">مساحة للتواصل وتبادل الخبرات بين المصممين. شارك أعمالك، اطرح الأسئلة، واحصل على إلهام من زملائك المبدعين.</p>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Placeholder for creating a new post -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <textarea class="form-control border-0" rows="3" placeholder="بماذا تفكر يا فنان؟ شارك فكرة أو سؤال..."></textarea>
                        <div class="text-end mt-2">
                            <button class="btn btn-primary">انشر الآن</button>
                        </div>
                    </div>
                </div>

                <!-- Placeholder for a community post/thread -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            {{-- Placeholder for user avatar --}}
                            <div class="rounded-circle bg-secondary me-3" style="width: 50px; height: 50px;"></div>
                            <div>
                                <h6 class="mb-0">أحمد علي</h6>
                                <small class="text-muted">منذ 5 دقائق</small>
                            </div>
                        </div>
                        <p>
                            مرحباً جميعاً، أبحث عن آراء حول هذا الشعار الذي صممته لشركة تقنية ناشئة. ما رأيكم في الألوان والخط؟ أي ملاحظات ستكون مفيدة جداً.
                        </p>
                        {{-- Placeholder for an image in the post --}}
                        <div class="text-center p-3 bg-light rounded">
                            [صورة الشعار هنا]
                        </div>
                    </div>
                </div>

                <!-- Another placeholder post -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-info me-3" style="width: 50px; height: 50px;"></div>
                            <div>
                                <h6 class="mb-0">سارة محمود</h6>
                                <small class="text-muted">منذ ساعة</small>
                            </div>
                        </div>
                        <p>
                            نصيحة لجميع المصممين: لا تتوقفوا أبداً عن تغذية إلهامكم البصري. ما هي أفضل المواقع التي تتابعونها للحصول على الإلهام اليومي؟
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
