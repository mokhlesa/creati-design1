@extends('layouts.public')

@section('content')
<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-5">
  <div class="container" style="margin-top: 5rem;">
    <div class="row align-items-center">
      <div class="col-md-5 col-lg-7 order-md-1 pt-8"><img class="img-fluid" src="{{ asset('theme/assets/img/illustrations/about.png') }}" alt="" /></div>
      <div class="col-md-7 col-lg-5 text-center text-md-start pt-5 pt-md-9">
        <h1 class="mb-4 display-4 fw-bold">منصتنا: وجهتك الأولى للإبداع</h1>
        <p class="mt-3 mb-4 lead text-muted">نحن نؤمن بأن الإبداع لا حدود له، وأن كل مصمم يستحق الأدوات والدعم اللازمين لتحقيق أقصى إمكاناته.</p>
      </div>
    </div>
  </div>
</section>
<!-- <section> close ============================-->
<!-- ============================================-->

<section class="py-6 bg-soft-danger">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h2 class="mb-4 fw-bold">ماذا نقدم؟</h2>
                <p class="lead text-muted mb-5">نوفر لك كل ما تحتاجه لتنطلق في عالم التصميم الجرافيكي، من الأساسيات إلى الاحتراف.</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6 col-lg-3 text-center mb-4">
                <div class="card h-100 p-4">
                    <h4 class="fw-bold">دورات متخصصة</h4>
                    <p>تغطي جميع جوانب التصميم، من أساسيات الفوتوشوب إلى تصميم الهوية البصرية.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center mb-4">
                <div class="card h-100 p-4">
                    <h4 class="fw-bold">مقالات إثرائية</h4>
                    <p>أحدث المقالات والنصائح من خبراء الصناعة لمواكبة التطورات والاتجاهات الجديدة.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center mb-4">
                <div class="card h-100 p-4">
                    <h4 class="fw-bold">تقييم بالذكاء الاصطناعي</h4>
                    <p>احصل على ملاحظات فورية وبناءة على أعمالك لمساعدتك على التحسين المستمر.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 text-center mb-4">
                <div class="card h-100 p-4">
                    <h4 class="fw-bold">مجتمع تفاعلي</h4>
                    <p>تواصل مع مصممين آخرين، شارك أعمالك، واطلب المشورة في بيئة داعمة وملهمة.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-6">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">رؤيتنا</h2>
                <p class="mb-4">أن نكون المنصة الرائدة في تمكين المصممين العرب، وتزويدهم بالمعرفة والأدوات والفرص التي تساعدهم على الابتكار والتميز في سوق العمل التنافسي.</p>
                <h2 class="fw-bold mb-3">رسالتنا</h2>
                <p class="mb-4">تقديم محتوى تعليمي عالي الجودة، وأدوات تقنية متطورة، ومجتمع داعم، لتعزيز مهارات التصميم الجرافيكي وتنمية المواهب الإبداعية.</p>
            </div>
            <div class="col-md-6 text-center">
                <img class="img-fluid" src="{{ asset('theme/assets/img/illustrations/feature-bg-1.png') }}" alt="" />
            </div>
        </div>
    </div>
</section>

<section class="py-5 text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold">انضم إلى مجتمعنا اليوم!</h2>
                <p class="lead my-4">سواء كنت تبدأ رحلتك في التصميم أو تتطلع إلى صقل مهاراتك، فإن منصتنا هي المكان المناسب لك.</p>
                <a href="{{ route('register') }}" class="btn btn-info btn-lg rounded-pill">ابدأ الآن مجاناً</a>
            </div>
        </div>
    </div>
</section>
@endsection