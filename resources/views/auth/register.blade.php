<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل حساب جديد</title>
    <!-- استخدام Bootstrap 5 RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .register-card { width: 100%; max-width: 450px; }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="card shadow-lg">
            <div class="card-header text-center bg-primary text-white">
                <h4 class="mb-0">تسجيل حساب جديد</h4>
            </div>
            <div class="card-body p-4">
                
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
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <!-- الاسم الأول -->
                    <div class="mb-3">
                        <label for="first_name" class="form-label">الاسم الأول</label>
                        <input id="first_name" class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
                    </div>

                    <!-- الاسم الأخير -->
                    <div class="mb-3">
                        <label for="last_name" class="form-label">الاسم الأخير</label>
                        <input id="last_name" class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" required>
                    </div>

                    <!-- اسم المستخدم -->
                    <div class="mb-3">
                        <label for="username" class="form-label">اسم المستخدم</label>
                        <input id="username" class="form-control" type="text" name="username" value="{{ old('username') }}" required>
                    </div>

                    <!-- البريد الإلكتروني -->
                    <div class="mb-3">
                        <label for="email" class="form-label">البريد الإلكتروني</label>
                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required>
                    </div>

                    <!-- كلمة المرور -->
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input id="password" class="form-control" type="password" name="password" required>
                    </div>

                    <!-- تأكيد كلمة المرور -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">تأكيد كلمة المرور</label>
                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                    </div>
                    
                    <!-- Role ID (مخفي للطالب) -->
                    <!-- افتراضاً أن أي مستخدم يسجل من هذه الواجهة هو طالب (role_id = 3) -->
                    <input type="hidden" name="role_id" value="3">

                    <!-- زر التسجيل -->
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">
                            تسجيل الحساب
                        </button>
                    </div>

                    <!-- رابط تسجيل الدخول -->
                    <div class="text-center mt-3">
                        <a class="text-sm text-decoration-none" href="{{ route('login') }}">
                            هل لديك حساب بالفعل؟ تسجيل الدخول
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>