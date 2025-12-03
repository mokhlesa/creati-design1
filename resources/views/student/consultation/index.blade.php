@extends('layouts.public')

@section('content')
<div class="container text-center py-5" dir="rtl">
    <img src="https://via.placeholder.com/150x50.png?text=Logo" alt="Logo" class="mb-4" style="max-width: 150px;">
    <h1 class="mb-4">استشارات الذكاء الاصطناعي</h1>
    <p class="lead mb-5">هنا يمكنك عرض استشاراتك السابقة أو طلب استشارة جديدة لتصميماتك.</p>
    
    <div class="d-flex justify-content-center mb-5">
        <a href="{{ route('student.consultation.create') }}" class="btn btn-primary btn-lg">طلب استشارة جديدة</a>
    </div>

    <h2 class="mb-4">استشاراتك السابقة</h2>
    <div class="row">
        @forelse($consultations as $consultation)
        <div class="col-md-4 mb-4">
            <div class="card text-start">
                <img src="{{ asset('storage/' . $consultation->image_url) }}" class="card-img-top" alt="صورة الاستشارة">
                <div class="card-body">
                    <h5 class="card-title">الطلب:</h5>
                    <p class="card-text">{{ $consultation->prompt }}</p>
                    <hr>
                    <h5 class="card-title">رأي الخبير:</h5>
                    <p class="card-text">{{ $consultation->feedback }}</p>
                    <p class="card-text"><small class="text-muted">تم الطلب {{ $consultation->created_at->diffForHumans() }}</small></p>
                    <form action="{{ route('student.consultation.destroy', $consultation) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من رغبتك في حذف هذه الاستشارة؟');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm w-100">حذف</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col">
            <div class="alert alert-info">
                لا يوجد لديك استشارات سابقة.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection