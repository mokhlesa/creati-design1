<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 navbar-custom">
    <div class="container-fluid">
        <!-- يمكنك وضع زر لتصغير القائمة الجانبية هنا -->
        <a class="navbar-brand text-dark" href="{{ route('admin.dashboard') }}">إدارة النظام</a>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- عناصر في الوسط -->
        </div>

        <ul class="navbar-nav">
            <!-- رابط العودة للموقع -->
            <li class="nav-item">
                <a class="nav-link btn btn-outline-secondary btn-sm me-3" href="/">
                    <i class="fas fa-globe me-1"></i> الموقع العام
                </a>
            </li>
            <!-- قائمة المستخدم -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle me-1"></i> {{ auth()->user()->first_name ?? 'المدير' }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">الملف الشخصي</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <!-- زر تسجيل الخروج -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt me-1"></i> تسجيل الخروج</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>