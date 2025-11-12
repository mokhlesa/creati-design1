@extends('admin.layouts.app')

@section('title', 'تفاصيل الطلب #' . $order->id)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">تفاصيل الطلب رقم #{{ $order->id }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6>معلومات العميل</h6>
                <p><strong>الاسم:</strong> {{ $order->user->first_name ?? 'مستخدم محذوف' }}</p>
                <p><strong>البريد الإلكتروني:</strong> {{ $order->user->email ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <h6>معلومات الطلب</h6>
                <p><strong>تاريخ الطلب:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
                <p><strong>الحالة:</strong> {{ $order->status }}</p>
                <p><strong>المبلغ الإجمالي:</strong> {{ $order->total_amount }}</p>
            </div>
        </div>
        <hr>
        <h6>العناصر المشتراة</h6>
        <table class="table">
            <thead>
                <tr>
                    <th>الدورة</th>
                    <th>السعر</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->course->title ?? 'دورة محذوفة' }}</td>
                    <td>{{ $item->price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">العودة لقائمة الطلبات</a>
    </div>
</div>
@endsection