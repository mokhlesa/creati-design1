<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        return view('help.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:3',
        ]);

        $query = strtolower($request->input('q')); // Convert query to lowercase for case-insensitive matching
        $results = null;

        if (str_contains($query, 'التسجيل في الدورات')) {
            $results = 'للتسجيل في الدورات، اذهب إلى صفحة الدورات، اختر الدورة التي ترغب بها، ثم اضغط على زر "سجل الآن".';
        } elseif (str_contains($query, 'إنشاء المقالات')) {
            $results = 'لإنشاء مقالات، يجب أن تكون لديك صلاحية ناشر. اذهب إلى لوحة تحكم الناشر وابحث عن قسم "المقالات" ثم اضغط على "إنشاء مقال جديد".';
        } elseif (str_contains($query, 'استشارة الذكاء الاصطناعي')) {
            $results = 'لطلب استشارة ذكاء اصطناعي، اذهب إلى صفحة "استشارات الذكاء الاصطناعي" واملأ النموذج بالمعلومات المطلوبة.';
        } else {
            $results = 'نعتذر، لم نتمكن من العثور على إجابة لسؤالك. يرجى وصف المشكلة بشكل أكثر تفصيلاً أو التواصل مع الدعم الفني.';
        }

        return view('help.search-results', ['query' => $request->input('q'), 'results' => $results]);
    }
}
