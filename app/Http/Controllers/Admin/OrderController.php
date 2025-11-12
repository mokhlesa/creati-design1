<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * عرض قائمة بجميع الطلبات.
     * سيتم جلب بيانات المستخدم المرتبط بكل طلب لتجنب مشكلة N+1.
     */
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(15);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * عرض تفاصيل طلب محدد.
     * سيتم جلب تفاصيل المستخدم والعناصر (الدورات) الموجودة ضمن الطلب.
     */
    public function show(Order $order)
    {
        // استخدام Route Model Binding لجلب الطلب تلقائياً
        // تحميل العلاقات اللازمة لعرضها في صفحة التفاصيل
        $order->load(['user', 'items.course']);

        return view('admin.orders.show', compact('order'));
    }

    /**
     * حذف طلب من قاعدة البيانات.
     * سيتم حذف جميع العناصر والمدفوعات المرتبطة به تلقائياً
     * بفضل قيود "ON DELETE CASCADE" في قاعدة البيانات.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        
        return redirect()->route('admin.orders.index')->with('success', 'تم حذف الطلب بنجاح.');
    }

    // ملاحظة: الدوال create, store, edit, update غير مطلوبة هنا
    // لأن المدير لا يقوم بإنشاء أو تعديل الطلبات من لوحة التحكم،
    // وهذا يتوافق مع المسارات المحددة في ملف web.php
    // ->only(['index', 'show', 'destroy']);
}