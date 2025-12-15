@extends('student.layouts.app')

@section('title', 'تقديم طلب معلم')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">تقديم طلب لتصبح معلمًا</div>

                <div class="card-body">
                    @if(isset($teacherRequest))
                        <div class="alert alert-success">
                            <h5>تم تقديم طلبك بنجاح!</h5>
                            <p>حالة الطلب: <strong>{{ $teacherRequest->status }}</strong></p>
                            <p>رسالتك:</p>
                            <p>{{ $teacherRequest->message }}</p>
                        </div>

                        <hr>

                        <h5>تعديل الطلب</h5>
                        <p>يمكنك تعديل رسالتك وإعادة إرسال الطلب.</p>

                        <form action="{{ route('student.teacher.request.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="message" class="form-label">رسالتك</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message', $teacherRequest->message) }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">تعديل وإعادة إرسال</button>
                        </form>

                    @else
                        <p>أهلاً بك! إذا كنت ترغب في الانضمام إلى فريق المعلمين لدينا، يرجى ملء النموذج التالي وسنقوم بمراجعة طلبك.</p>
                        
                        <form action="{{ route('student.teacher.request.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="message" class="form-label">لماذا تريد أن تصبح معلمًا وما هي خبراتك التعليمية؟</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">إرسال الطلب</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
