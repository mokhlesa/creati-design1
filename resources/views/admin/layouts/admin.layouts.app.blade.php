<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم')</title>
    <!-- أضف هنا ملفات CSS مثل Bootstrap أو Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <!-- Font Awesome Icons (مُضافة لدعم الأيقونات في لوحة التحكم) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body { background-color: #f8f9fa; }
        .content-wrapper { margin-right: 250px; padding: 20px; }
        .sidebar { position: fixed; top: 0; right: 0; bottom: 0; width: 250px; background-color: #343a40; color: white; z-index: 1000; }
        /* لتجنب تداخل محتوى الـ wrapper مع شريط التنقل العلوي في الـ app.blade.php (إذا كان موجوداً) */
        .navbar + .content-wrapper { margin-top: 0; } 
    </style>
</head>
<body>
    <div class="d-flex">
        @include('admin.layouts.sidebar')

        <div class="content-wrapper w-100">
            @include('admin.layouts.navbar')
            
            <main class="container-fluid mt-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- أضف هنا ملفات JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>