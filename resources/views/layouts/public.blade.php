<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

  <head>
    <meta charset="utf-g">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('theme/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('theme/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('theme/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('theme/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('theme/assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
        <link href="{{ asset('theme/assets/css/theme-rtl.css') }}" rel="stylesheet" />
        @stack('styles')
      </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main pt-8" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand" href="/"><img class="img-fluid" src="{{ asset('theme/assets/img/icons/logo.png') }}" alt="" /></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto ms-lg-4 ms-xl-7 border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
              <li class="nav-item"><a class="nav-link fw-bold active" aria-current="page" href="{{ route('about.index') }}">من نحن</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="{{ route('help.index') }}">المساعدة</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="{{ route('features.index') }}">الميزات</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="{{ route('courses.index') }}">الدورات</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="{{ route('posts.index') }}">المقالات</a></li>
              <li class="nav-item"><a class="nav-link fw-medium" href="{{ route('portfolio.index') }}">معرض الاعمال</a></li>
              @auth
              <li class="nav-item"><a class="nav-link fw-medium" href="{{ route('student.consultation.create') }}">استشارة الذكاء</a></li>
              @endauth
            </ul>
            @if (Route::has('login'))
                <div class="d-flex py-3 py-lg-0">
                    @auth
                        <a href="{{ route('profile.edit') }}" class="btn btn-light rounded-pill shadow fw-bold me-2" role="button">الملف الشخصي</a>
                        <div class="dropdown">
                            <a class="btn btn-light rounded-pill shadow fw-bold dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                لوحة التحكم
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ url('/dashboard') }}">لوحة التحكم</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">تسجيل الخروج</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-light rounded-pill shadow fw-bold me-2" role="button">دخول</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-info rounded-pill shadow fw-bold" role="button">تسجيل
                                <svg class="bi bi-arrow-right" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#9C69E2" viewBox="0 0 16 16">
                                  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                                </svg>
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
          </div>
        </div>
      </nav>

      @yield('content')


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-6 pb-0">

        <div class="container">
          <hr class="text-info opacity-25" />
          <div class="row py-7 justify-content-sm-between text-center text-md-start">
            <div class="col-md-6">
              <h1 class="fw-bold">طور مهاراتك في التصميم</h1>
              <p>اكتشف مجموعة واسعة من الدورات المجانية والمدفوعة</p>
            </div>
            <div class="col-md-6 text-lg-end"><a class="btn btn-lg btn-danger rounded-pill me-4 me-md-3 me-lg-4" href="{{ route('about.index') }}" role="button">اعرف أكثر</a><a class="btn btn-light rounded-pill shadow fw-bold" href="{{ route('courses.index') }}" role="button">تصفح الدورات
                <svg class="bi bi-arrow-right" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#9C69E2" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"></path>
                </svg></a></div>
          </div>
          <div class="row justify-content-lg-around">
            <div class="col-12 col-sm-12 col-lg-3 mb-4 order-0 order-sm-0"><a class="text-decoration-none" href="#"><img class="img-fluid me-3" src="{{ asset('theme/assets/img/icons/logo.png') }}" alt="" /><span class="fw-bold fs-1 text-1000">منصة التصميم</span></a>
              <p class="mt-4">{!! $settings['contact_address']->value ?? '' !!}</p>
              <p>{{ $settings['contact_email']->value ?? '' }}<br />{{ $settings['contact_phone']->value ?? '' }}</p>
            </div>
            <div class="col-6 col-sm-4 col-lg-3 mb-3 order-3 order-sm-2">
              <h6 class="lh-lg fw-bold mb-4"> المساعدة </h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                <li class="lh-lg"><a class="text-dark fs--1 text-decoration-none" href="#!">الدعم</a></li>
                <li class="lh-lg"><a class="text-dark fs--1 text-decoration-none" href="#!">التسجيل </a></li>
                <li class="lh-lg"><a class="text-dark fs--1 text-decoration-none" href="#!">دليل</a></li>
                <li class="lh-lg"><a class="text-dark fs--1 text-decoration-none" href="#!">تقارير</a></li>
                <li class="lh-lg"><a class="text-dark fs--1 text-decoration-none" href="#!">سؤال وجواب</a></li>
              </ul>
            </div>
            <div class="col-12 col-sm-4 col-lg-3 mb-3 order-1 order-sm-3">
              <h6 class="lh-lg fw-bold mb-4">التواصل الاجتماعي </h6>
              <ul class="list-unstyled mb-md-4 mb-lg-0">
                @foreach ($socialLinks as $link)
                <li class="list-inline-item"><a class="text-dark fs--1 text-decoration-none" href="{{ $link->url }}" target="_blank"><img class="img-fluid" src="{{ asset($link->icon) }}" width="40" alt="{{ $link->name }}" /></a></li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-6">

        <div class="container">
          <div class="row flex-center px-3">
            <div class="col-12 col-md-6 px-md-0 order-1 order-md-0">
              <div class="text-center text-md-start">
                <p class="mb-0"> 
                    تصميم وبرمجة: مخلصة الريس
                </p>
              </div>
            </div>
            <div class="col-12 col-md-6 text-center text-md-end mb-3 mb-md-0"> <a href="#"><img class="img-fluid" src="{{ asset('theme/assets/img/icons/pre-footer.png') }}" height="14" alt="" /></a></div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('theme/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('theme/vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('theme/assets/js/theme.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,700;1,900&amp;display=swap" rel="stylesheet">
  </body>

</html>