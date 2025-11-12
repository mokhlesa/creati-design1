<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    /**
     * عرض قائمة بجميع الاستشارات المقدمة.
     */
    public function index()
    {
        $consultations = Consultation::with(['user', 'feedback'])->latest()->paginate(15);
        return view('admin.consultations.index', compact('consultations'));
    }

    /**
     * عرض تفاصيل استشارة محددة مع تقييم الذكاء الاصطناعي.
     */
    public function show(Consultation $consultation)
    {
        // تحميل العلاقات للتأكد من وجودها
        $consultation->load(['user', 'feedback']);
        return view('admin.consultations.show', compact('consultation'));
    }

    /**
     * حذف استشارة من قاعدة البيانات.
     */
    public function destroy(Consultation $consultation)
    {
        // عند حذف الاستشارة، سيتم حذف التقييم المرتبط بها تلقائيًا
        // بفضل قيد "ON DELETE CASCADE" في قاعدة البيانات.
        $consultation->delete();
        
        return redirect()->route('admin.consultations.index')->with('success', 'تم حذف الاستشارة بنجاح.');
    }
    
    // ملاحظة: الدوال create, store, edit, update غير مطلوبة هنا
    // لأن المدير لا يقوم بإنشاء أو تعديل الاستشارات من لوحة التحكم،
    // وهذا يتوافق مع المسارات المحددة في ملف web.php
    // ->only(['index', 'show', 'destroy']);
}