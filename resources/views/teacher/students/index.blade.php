@extends('teacher.layouts.app')

@section('title', 'طلاب الدورات')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">قائمة الطلاب</h5>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>اسم الطالب</th>
                    <th>البريد الإلكتروني</th>
                    <th>عدد أعماله المعروضة</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->studentShowcases->count() }}</td>
                        <td>
                            <a href="{{ route('teacher.students.showcases', $student->id) }}" class="btn btn-info btn-sm">عرض أعمال الطالب</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">لا يوجد طلاب مسجلون في دوراتك بعد.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-3">{{ $students->links() }}</div>
    </div>
</div>
@endsection
