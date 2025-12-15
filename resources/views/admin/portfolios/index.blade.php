@extends('admin.layouts.app')

@section('title', 'إدارة معارض الأعمال')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>إدارة معارض الأعمال</h5>
                    <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> إضافة معرض أعمال جديد</a>
                </div>

                <div class="card-body">
                    @if($portfolios->isEmpty())
                        <p class="text-center">لا يوجد معارض أعمال مضافة بعد.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان معرض الأعمال</th>
                                        <th>صورة مصغرة</th>
                                        <th>رابط</th>
                                        <th>مُضاف بواسطة</th>
                                        <th>تاريخ الإنشاء</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($portfolios as $portfolio)
                                        <tr>
                                            <td>{{ $portfolio->id }}</td>
                                            <td>{{ $portfolio->title }}</td>
                                            <td>
                                                @if($portfolio->image_path)
                                                    <img src="{{ Storage::url($portfolio->image_path) }}" alt="{{ $portfolio->title }} image" class="img-thumbnail" width="100">
                                                @else
                                                    <span class="text-muted">لا يوجد صورة</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($portfolio->url)
                                                    <a href="{{ $portfolio->url }}" target="_blank">{{ Str::limit($portfolio->url, 30) }}</a>
                                                @else
                                                    <span class="text-muted">لا يوجد رابط</span>
                                                @endif
                                            </td>
                                            <td>{{ $portfolio->user->name ?? 'غير معروف' }}</td>
                                            <td>{{ $portfolio->created_at->format('Y-m-d H:i') }}</td>
                                            <td>
                                                <a href="{{ route('admin.portfolios.show', $portfolio->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                                <form action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا المعرض؟')"><i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            {{ $portfolios->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection