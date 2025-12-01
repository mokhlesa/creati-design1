@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-3 mt-5">
                    <div class="card-header text-center bg-info text-white p-4">
                        <h4 class="mb-0">تسجيل الدخول إلى المنصة</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">

                        <!-- رسائل حالة الجلسة (مثل رسالة إعادة تعيين كلمة المرور) -->
                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif
                        
                        <!-- رسائل الأخطاء العامة -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- البريد الإلكتروني أو اسم المستخدم -->
                            <div class="mb-3">
                                <label for="login" class="form-label">البريد الإلكتروني أو اسم المستخدم</label>
                                <input id="login" class="form-control" type="text" name="login" value="{{ old('login') }}" required autofocus>
                            </div>

                            <!-- كلمة المرور -->
                            <div class="mb-3">
                                <label for="password" class="form-label">كلمة المرور</label>
                                <input id="password" class="form-control" type="password" name="password" required>
                            </div>

                            <!-- تذكرني (Remember Me) -->
                            <div class="form-check mb-3">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label for="remember_me" class="form-check-label">تذكرني</label>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-4">
                                @if (Route::has('password.request'))
                                    <a class="text-sm text-decoration-none" href="{{ route('password.request') }}">
                                        نسيت كلمة المرور؟
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-info text-white fw-bold">
                                    تسجيل الدخول
                                </button>
                            </div>
                            <div class="text-center mt-3">
                                <a class="text-sm text-decoration-none" href="{{ route('register') }}">
                                    لا تملك حسابًا؟ سجل الآن
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- أزرار تسجيل الدخول السريعة -->
                <div class="mt-4 p-3 bg-light border rounded">
                    <h6 class="mb-2 text-dark text-center">تسجيل الدخول السريع (الاختبار)</h6>
                    <div class="d-flex flex-wrap justify-content-center">
                        <button onclick="quickLogin('admin@example.com', 'password')" class="btn btn-info quick-login-btn m-1">
                            المدير (admin)
                        </button>
                        <button onclick="quickLogin('instructor@example.com', 'password')" class="btn btn-success quick-login-btn m-1">
                            المعلم (خالد)
                        </button>
                        <button onclick="quickLogin('ahmad@example.com', 'password')" class="btn btn-warning quick-login-btn m-1">
                            الطالب (أحمد)
                        </button>
                        <button onclick="quickLogin('fatima@example.com', 'password')" class="btn btn-warning quick-login-btn m-1">
                            الطالبة (فاطمة)
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function quickLogin(emailOrUsername, password) {
        document.getElementById('login').value = emailOrUsername;
        document.getElementById('password').value = password;
        document.querySelector('form').submit();
    }
</script>
@endsection