<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم')</title>
    <!-- Bootstrap 5 RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { 
            position: fixed; 
            top: 0; 
            right: 0; 
            bottom: 0; 
            width: 250px; 
            background-color: #343a40; 
            color: white; 
            z-index: 1000; 
            overflow-y: auto; /* لتمكين التمرير إذا كانت القائمة طويلة */
        }
        .content-wrapper { 
            margin-right: 250px; /* لإفساح المجال للشريط الجانبي */
            padding: 0; 
            min-height: 100vh;
        }
        .nav-link.text-white:hover {
            background-color: #495057;
            border-radius: 5px;
        }
        .navbar-custom { border-bottom: 1px solid #dee2e6; }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- الشريط الجانبي (Sidebar) -->
        @include('teacher.layouts.sidebar')

        <div class="content-wrapper w-100">
            <!-- شريط التنقل العلوي (Navbar) -->
            @include('teacher.layouts.navbar')
            
            <main class="container-fluid p-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap JavaScript Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>