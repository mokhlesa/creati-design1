<div class="sidebar p-3">
    <h3 class="text-center mb-4 border-bottom pb-2">لوحة الطالب</h3>
    <ul class="nav flex-column">
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('student.dashboard') }}"><i class="fas fa-home me-2"></i> الرئيسية</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('student.my-courses') }}"><i class="fas fa-book-open me-2"></i> دوراتي</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('student.showcases.index') }}"><i class="fas fa-palette me-2"></i> معرض أعمالي</a>
        </li>
        <li class="nav-item mb-1">
            <a class="nav-link text-white" href="{{ route('student.consultation.create') }}"><i class="fas fa-comments me-2"></i> استشارة تصميم AI</a>
        </li>
        {{-- Add other student-specific links here --}}
    </ul>
</div>
