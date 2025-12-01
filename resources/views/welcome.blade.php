@extends('layouts.public')

@section('content')
      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-5">

        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-5 col-lg-7 order-md-1 pt-8"><img class="img-fluid" src="{{ asset('theme/assets/img/illustrations/hero-header.png') }}" alt="" /></div>
            <div class="col-md-7 col-lg-5 text-center text-md-start pt-5 pt-md-9">
              <h1 class="mb-4 display-2 fw-bold">صمم مستقبلك <br class="d-block d-lg-none d-xl-block" />الإبداعي هنا.</h1>
              <p class="mt-3 mb-4">منصتنا هي مساحتك لتطوير مهاراتك في التصميم الجرافيكي، <br />مع دورات ومقالات وتقييمات مدعومة بالذكاء الاصطناعي.</p><a class="btn btn-lg btn-info rounded-pill" href="{{ route('about.index') }}" role="button">اعرف أكثر</a>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-4">

        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="card mb-3 bg-soft-danger rounded-3">
                <div class="row g-0 align-items-center">
                  <div class="col-md-5 col-lg-6 text-md-center"><img class="img-fluid" src="{{ asset('theme/assets/img/illustrations/about.png') }}" alt="" /></div>
                  <div class="col-md-7 col-lg-6 px-md-2 px-xl-6 text-center text-md-start">
                    <div class="card-body px-4 py-5 p-lg-3 p-md-4">
                      <h1 class="mb-4 fw-bold">نحن منصة تعليمية<br class="d-md-none d-xxl-block" />متكاملة للمصممين</h1>
                      <p class="card-text">نوفر لك كل ما تحتاجه لتصقل موهبتك في التصميم، من دورات<br class="d-none d-xxl-block" />تدريبية ومقالات ملهمة، إلى أدوات تقييم مبتكرة<br class="d-none d-xxl-block" />تعتمد على الذكاء الاصطناعي لمساعدتك على تطوير أعمالك.<br class="d-none d-xxl-block" />انضم إلينا اليوم وابدأ رحلتك نحو الاحتراف.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-6">
        <div class="container-lg">
          <div class="row flex-center mb-5">
            <div class="col-auto text-center my-4">
              <h1 class="mb-4 fw-bold">ميزاتنا</h1>
              <p>نقدم لكم مجموعة من الميزات والخدمات التي تساعدكم على تحقيق أهدافكم الإبداعية.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-4">
              <div class="card px-5 px-md-3 py-lg-5">
                <div class="row flex-center">
                  <div class="bg-holder z-index-1 d-none d-lg-block" style="background-image:url({{ asset('theme/assets/img/illustrations/feature-bg-1.png') }});background-position:center;background-size:contain;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="bg-holder z-index-1 d-block d-lg-none" style="background-image:url({{ asset('theme/assets/img/illustrations/feature-bg-1.png') }});background-position:center;background-size:cover;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="col-md-4 pe-0 pe-md-0 text-center"><img class="img-fluid" src="{{ asset('theme/assets/img/illustrations/feature-search.png') }}" alt="" /></div>
                  <div class="col-md-8 ps-md-3 pe-md-2 text-center text-md-start z-index-2">
                    <div class="card-body px-0">
                      <h4 class="card-title pt-md-5">دورات متخصصة</h4>
                      <p class="mb-0">تعلم من خلال دوراتنا التي <br class="d-none d-lg-block"> تغطي كافة جوانب التصميم <br class="d-none d-lg-block"> الجرافيكي، من المبادئ الأساسية <br class="d-none d-lg-block"> إلى التقنيات المتقدمة. </p>
                      <div><a class="btn btn-lg ps-0 pe-3" href="{{ route('courses.index') }}" role="button">اعرف أكثر</a>
                        <svg class="bi bi-arrow-right" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#9C6E2" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="card px-5 px-md-3 py-lg-5">
                <div class="row flex-center">
                  <div class="bg-holder z-index-1 d-none d-lg-block" style="background-image:url({{ asset('theme/assets/img/illustrations/feature-bg-2.png') }});background-position:center;background-size:contain;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="bg-holder z-index-1 d-block d-lg-none" style="background-image:url({{ asset('theme/assets/img/illustrations/feature-bg-2.png') }});background-position:center;background-size:cover;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="col-md-4 pe-0 pe-md-0 text-center"><img class="img-fluid" src="{{ asset('theme/assets/img/illustrations/feature-hour.png') }}" alt="" /></div>
                  <div class="col-md-8 ps-md-3 pe-md-2 text-center text-md-start z-index-2">
                    <div class="card-body px-0">
                      <h4 class="card-title pt-md-5">مقالات إثرائية</h4>
                      <p class="mb-0">اطلع على أحدث الاتجاهات <br class="d-none d-lg-block"> والأفكار في عالم التصميم <br class="d-none d-lg-block"> من خلال مقالاتنا التي <br class="d-none d-lg-block"> يكتبها خبراء في المجال. </p>
                      <div><a class="btn btn-lg ps-0 pe-3" href="{{ route('posts.index') }}" role="button">اعرف أكثر</a>
                        <svg class="bi bi-arrow-right" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#9C69E2" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="card px-5 px-md-3 py-lg-5">
                <div class="row flex-center">
                  <div class="bg-holder z-index-1 d-none d-lg-block" style="background-image:url({{ asset('theme/assets/img/illustrations/feature-bg-3.png') }});background-position:center;background-size:contain;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="bg-holder z-index-1 d-block d-lg-none" style="background-image:url({{ asset('theme/assets/img/illustrations/feature-bg-3.png') }});background-position:center;background-size:cover;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="col-md-4 pe-0 pe-md-0 text-center"><img class="img-fluid" src="{{ asset('theme/assets/img/illustrations/feature-print.png') }}" alt="" /></div>
                  <div class="col-md-8 ps-md-3 pe-md-2 text-center text-md-start z-index-2">
                    <div class="card-body px-0">
                      <h4 class="card-title pt-md-5">تقييم بالذكاء الاصطناعي</h4>
                      <p class="mb-0">احصل على تقييم فوري <br class="d-none d-lg-block"> لتصاميمك واقتراحات للتحسين <br class="d-none d-lg-block"> باستخدام أدواتنا المبتكرة <br class="d-none d-lg-block"> المدعومة بالذكاء الاصطناعي. </p>
                      <div><a class="btn btn-lg ps-0 pe-3" href="{{ route('ai-assessor') }}" role="button">اعرف أكثر</a>
                        <svg class="bi bi-arrow-right" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#9C69E2" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-4">
              <div class="card px-5 px-md-3 py-lg-5">
                <div class="row flex-center">
                  <div class="bg-holder z-index-1 d-none d-lg-block" style="background-image:url({{ asset('theme/assets/img/illustrations/feature-bg-4.png') }});background-position:center;background-size:contain;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="bg-holder z-index-1 d-block d-lg-none" style="background-image:url({{ asset('theme/assets/img/illustrations/feature-bg-4.png') }});background-position:center;background-size:cover;">
                  </div>
                  <!--/.bg-holder-->

                  <div class="col-md-4 pe-0 pe-md-0 text-center"><img class="img-fluid" src="{{ asset('theme/assets/img/illustrations/feature-security.png') }}" alt="" /></div>
                  <div class="col-md-8 ps-md-3 pe-md-2 text-center text-md-start z-index-2">
                    <div class="card-body px-0">
                      <h4 class="card-title pt-md-5">مجتمع تفاعلي</h4>
                      <p class="mb-0">تواصل مع مصممين آخرين، <br class="d-none d-lg-block"> شارك أعمالك، واحصل على <br class="d-none d-lg-block"> آراء قيمة من <br class="d-none d-lg-block"> مجتمعنا الإبداعي. </p>
                      <div><a class="btn btn-lg ps-0 pe-3" href="{{ route('community.index') }}" role="button">اعرف أكثر</a>
                        <svg class="bi bi-arrow-right" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#9C69E2" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <div class="container-lg bg-info p-5 p-md-5 p-xl-7 rounded-3">
          <div class="row flex-center">
            <div class="col-12">
              <h2 class="text-light fw-bold">آراء طلابنا</h2>
            </div>
          </div>
          <div class="carousel slide pt-6" id="carouselExampleDark" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <div class="row h-100">
                  <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card h-100 py-3">
                      <div class="card-body my-2">
                        <div class="d-flex align-items-center"><img class="img-fluid me-3 me-md-2 me-lg-3" src="{{ asset('theme/assets/img/gallery/1.png') }}" width="70" alt="" />
                          <div class="flex-1 align-items-center">
                            <h6 class="mb-0 fs--1 text-1000 fw-medium">أحمد علي</h6>
                            <p class="fs--2 fw-normal text-info mb-0">طالب تصميم جرافيك</p>
                          </div>
                        </div>
                        <p class="card-text ps-7 ps-md-0 ps-xl-7 pt-md-4 pt-lg-3 pt-xl-0">“منصة رائعة! الدورات شاملة والتقييم بالذكاء الاصطناعي ساعدني كثيراً في تحسين تصاميمي.”</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card h-100 py-3">
                      <div class="card-body my-2">
                        <div class="d-flex align-items-center"><img class="img-fluid me-3 me-md-2 me-lg-3" src="{{ asset('theme/assets/img/gallery/2.png') }}" width="70" alt="" />
                          <div class="flex-1 align-items-center">
                            <h6 class="mb-0 fs--1 text-1000 fw-medium">سارة محمود</h6>
                            <p class="fs--2 fw-normal text-info mb-0">مصممة مستقلة</p>
                          </div>
                        </div>
                        <p class="card-text ps-7 ps-md-0 ps-xl-7 pt-md-4 pt-lg-3 pt-xl-0">“أحببت تنوع المقالات والمحتوى الملهم. المنصة هي مصدري الأول لكل جديد في عالم التصميم.”</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card h-100 py-3">
                      <div class="card-body my-2">
                        <div class="d-flex align-items-center"><img class="img-fluid me-3 me-md-2 me-lg-3" src="{{ asset('theme/assets/img/gallery/3.png') }}" width="70" alt="" />
                          <div class="flex-1 align-items-center">
                            <h6 class="mb-0 fs--1 text-1000 fw-medium">خالد عبدالله</h6>
                            <p class="fs--2 fw-normal text-info mb-0">طالب</p>
                          </div>
                        </div>
                        <p class="card-text ps-7 ps-md-0 ps-xl-7 pt-md-4 pt-lg-3 pt-xl-0">“مجتمع تفاعلي ومفيد جداً. تعلمت الكثير من خلال مشاركة أعمالي والحصول على آراء من مصممين آخرين.”</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <div class="row h-100">
                  <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card h-100 py-3">
                      <div class="card-body my-2">
                        <div class="d-flex align-items-center"><img class="img-fluid me-3 me-md-2 me-lg-3" src="{{ asset('theme/assets/img/gallery/1.png') }}" width="70" alt="" />
                          <div class="flex-1 align-items-center">
                            <h6 class="mb-0 fs--1 text-1000 fw-medium">Viezh Robert</h6>
                            <p class="fs--2 fw-normal text-info mb-0">arsaw, Poland</p>
                          </div>
                        </div>
                        <p class="card-text ps-7 ps-md-0 ps-xl-7 pt-md-4 pt-lg-3 pt-xl-0">“Wow...I am very happy to use this VPN, it turned out to be more than my expectations and so far there have been no problems. LaslesVPN always the best”.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card h-100 py-3">
                      <div class="card-body my-2">
                        <div class="d-flex align-items-center"><img class="img-fluid me-3 me-md-2 me-lg-3" src="{{ asset('theme/assets/img/gallery/2.png') }}" width="70" alt="" />
                          <div class="flex-1 align-items-center">
                            <h6 class="mb-0 fs--1 text-1000 fw-medium">Kim Young Jou</h6>
                            <p class="fs--2 fw-normal text-info mb-0">UX Engineer</p>
                          </div>
                        </div>
                        <p class="card-text ps-7 ps-md-0 ps-xl-7 pt-md-4 pt-lg-3 pt-xl-0">“I like it because I like to travel far and still can connect with high speed.”</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card h-100 py-3">
                      <div class="card-body my-2">
                        <div class="d-flex align-items-center"><img class="img-fluid me-3 me-md-2 me-lg-3" src="{{ asset('theme/assets/img/gallery/3.png') }}" width="70" alt="" />
                          <div class="flex-1 align-items-center">
                            <h6 class="mb-0 fs--1 text-1000 fw-medium">Kim Young Jou</h6>
                            <p class="fs--2 fw-normal text-info mb-0">Web Designer</p>
                          </div>
                        </div>
                        <p class="card-text ps-7 ps-md-0 ps-xl-7 pt-md-4 pt-lg-3 pt-xl-0">“I like it because I like to travel far and still can connect with high speed.”</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row h-100">
                  <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card h-100 py-3">
                      <div class="card-body my-2">
                        <div class="d-flex align-items-center"><img class="img-fluid me-3 me-md-2 me-lg-3" src="{{ asset('theme/assets/img/gallery/1.png') }}" width="70" alt="" />
                          <div class="flex-1 align-items-center">
                            <h6 class="mb-0 fs--1 text-1000 fw-medium">Viezh Robert</h6>
                            <p class="fs--2 fw-normal text-info mb-0">arsaw, Poland</p>
                          </div>
                        </div>
                        <p class="card-text ps-7 ps-md-0 ps-xl-7 pt-md-4 pt-lg-3 pt-xl-0">“Wow...I am very happy to use this VPN, it turned out to be more than my expectations and so far there have been no problems. LaslesVPN always the best”.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card h-100 py-3">
                      <div class="card-body my-2">
                        <div class="d-flex align-items-center"><img class="img-fluid me-3 me-md-2 me-lg-3" src="{{ asset('theme/assets/img/gallery/2.png') }}" width="70" alt="" />
                          <div class="flex-1 align-items-center">
                            <h6 class="mb-0 fs--1 text-1000 fw-medium">Kim Young Jou</h6>
                            <p class="fs--2 fw-normal text-info mb-0">UX Engineer</p>
                          </div>
                        </div>
                        <p class="card-text ps-7 ps-md-0 ps-xl-7 pt-md-4 pt-lg-3 pt-xl-0">“I like it because I like to travel far and still can connect with high speed.”</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card h-100 py-3">
                      <div class="card-body my-2">
                        <div class="d-flex align-items-center"><img class="img-fluid me-3 me-md-2 me-lg-3" src="{{ asset('theme/assets/img/gallery/3.png') }}" width="70" alt="" />
                          <div class="flex-1 align-items-center">
                            <h6 class="mb-0 fs--1 text-1000 fw-medium">Kim Young Jou</h6>
                            <p class="fs--2 fw-normal text-info mb-0">Web Designer</p>
                          </div>
                        </div>
                        <p class="card-text ps-7 ps-md-0 ps-xl-7 pt-md-4 pt-lg-3 pt-xl-0">“I like it because I like to travel far and still can connect with high speed.”</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row px-3 px-md-0 mt-4">
              <div class="col-6 position-relative">
                <ol class="carousel-indicators">
                  <li class="active" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"></li>
                  <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                  <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
                </ol>
              </div>
              <div class="col-6 position-relative"><a class="carousel-control-prev carousel-icon z-index-2" href="#carouselExampleDark" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next carousel-icon z-index-2" href="#carouselExampleDark" role="button" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></a></div>
            </div>
          </div>
        </div>
      </section>
@endsection
