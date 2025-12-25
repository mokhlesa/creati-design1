@extends('layouts.public')

@section('content')
<div class="container text-center py-5" dir="rtl">
    <img src="{{ asset('theme/assets/img/icons/logoo.png') }}" alt="Logo" class="mb-4" style="max-width: 150px;">
    <h1 class="mb-4">طلب استشارة تصميم جديدة</h1>
    <p class="lead mb-5">ارفع تصميمك واحصل على رأي الخبير الفني باستخدام الذكاء الاصطناعي.</p>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-start">
                <div class="card-header">رفع تصميم جديد للاستشارة</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('student.consultation.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">ملف التصميم الخاص بك:</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="mb-3">
                            <label for="prompt" class="form-label">طلبك من المحلل الذكي:</label>
                            <select name="prompt_template" class="form-select mb-2">
                                <option value="">اختر من الطلبات الجاهزة...</option>
                                <option value="حلل لي خطوط التصميم واقترح الخطوط المناسبة مع التعليل.">حلل لي خطوط التصميم واقترح الخطوط المناسبة مع التعليل.</option>
                                <option value="حلل لي تناسق الألوان في تصميمي واقترح تحسينات.">حلل لي تناسق الألوان في تصميمي واقترح تحسينات.</option>
                                <option value="حلل لي التخطيط والتكوين العام للتصميم.">حلل لي التخطيط والتكوين العام للتصميم.</option>
                                <option value="حدد لي أي أخطاء دمج أو عدم تناسق في تصميمي.">حدد لي أي أخطاء دمج أو عدم تناسق في تصميمي.</option>
                                <option value="قيّم استخدام الظلال والإضاءة في تصميمي.">قيّم استخدام الظلال والإضاءة في تصميمي.</option>
                            </select>
                            <textarea class="form-control" id="prompt" name="prompt" rows="3" placeholder="... أو اكتب طلبك الخاص هنا"></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">احصل على الاستشارة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection