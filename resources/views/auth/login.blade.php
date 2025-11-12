<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول</title>
    <!-- استخدام Bootstrap 5 RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .login-card { width: 100%; max-width: 450px; }
        .quick-login-btn { font-size: 0.8rem; padding: 0.25rem 0.5rem; margin-bottom: 5px; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="card shadow-lg">
            <div class="card-header text-center bg-dark text-white">
                <h4 class="mb-0">تسجيل الدخول إلى المنصة</h4>
            </div>
            <div class="card-body p-4">

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

                        <button type="submit" class="btn btn-primary">
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function quickLogin(emailOrUsername, password) {
            document.getElementById('login').value = emailOrUsername;
            document.getElementById('password').value = password;
            document.querySelector('form').submit();
        }
    </script>
</body>
</html>