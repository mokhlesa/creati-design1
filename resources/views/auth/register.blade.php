@extends('layouts.public')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-3 mt-5">
                    <div class="card-header text-center bg-info text-white p-4">
                        <h4 class="mb-0">تسجيل حساب جديد</h4>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
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
                            
                            <div class="row">
                                <!-- الاسم الأول -->
                                <div class="col-md-6 mb-3">
                                    <label for="first_name" class="form-label">الاسم الأول</label>
                                    <input id="first_name" class="form-control" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                </div>

                                <!-- الاسم الأخير -->
                                <div class="col-md-6 mb-3">
                                    <label for="last_name" class="form-label">الاسم الأخير</label>
                                    <input id="last_name" class="form-control" type="text" name="last_name" value="{{ old('last_name') }}" required>
                                </div>
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
                            <input type="hidden" name="role_id" value="3">

                            <!-- زر التسجيل -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-info text-white fw-bold">
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
        </div>
    </div>
</section>
@endsection