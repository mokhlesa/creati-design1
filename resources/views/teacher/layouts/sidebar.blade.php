<div class="sidebar p-3">
    <h3 class="text-center mb-4 border-bottom pb-2">لوحة المعلم</h3>
    <ul class="nav flex-column">
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('teacher.dashboard') }}"><i class="fas fa-home me-2"></i> الرئيسية</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('teacher.courses.index') }}"><i class="fas fa-chalkboard-teacher me-2"></i> إدارة دوراتي</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('teacher.students.index') }}"><i class="fas fa-user-graduate me-2"></i> الطلاب وأعمالهم</a>
        </li>
        {{-- Add other teacher-specific links here --}}
    </ul>
</div>
