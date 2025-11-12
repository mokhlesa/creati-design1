<div class="sidebar p-3">
    <h3 class="text-center mb-4 border-bottom pb-2">لوحة المدير</h3>
    <ul class="nav flex-column">
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('admin.dashboard') }}"><i class="fas fa-home me-2"></i> الرئيسية</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('admin.users.index') }}"><i class="fas fa-users me-2"></i> المستخدمون</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('admin.roles.index') }}"><i class="fas fa-user-tag me-2"></i> الأدوار</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('admin.courses.index') }}"><i class="fas fa-chalkboard-teacher me-2"></i> إدارة الدورات</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('admin.posts.index') }}"><i class="fas fa-newspaper me-2"></i> المقالات والمدونة</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('admin.categories.index') }}"><i class="fas fa-tags me-2"></i> التصنيفات</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('admin.orders.index') }}"><i class="fas fa-shopping-cart me-2"></i> الطلبات</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('admin.consultations.index') }}"><i class="fas fa-robot me-2"></i> استشارات AI</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('admin.student-showcases.index') }}"><i class="fas fa-award me-2"></i> أعمال الطلاب</a>
        </li>
    </ul>
</div>