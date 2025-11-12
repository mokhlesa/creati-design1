<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // =========================================================================
        // ==  تعديلات قواعد التحقق (Validation Rules) لتناسب حقول المشروع  ========
        // =========================================================================
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'], // تحقق من أن اسم المستخدم فريد
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['nullable', 'exists:roles,id'], // حقل مخفي في النموذج، لكن للتحقق
        ]);

        // =========================================================================
        // ==  تعديلات عملية الإنشاء (User::create) لتناسب حقول المشروع  ===========
        // =========================================================================
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // نستخدم القيمة المرسلة (3) من النموذج، أو نحددها بـ 3 افتراضياً إن لم ترسل
            'role_id' => $request->role_id ?? 3, 
        ]);

        event(new Registered($user));

        Auth::login($user);

        // هنا يجب تغيير مسار إعادة التوجيه الافتراضي لـ Breeze 
        // إلى المسار الصحيح للمستخدم بعد تسجيل الدخول (مثلاً: /profile أو /courses)
        // لنستخدم مسار لوحة التحكم الخاصة بالمستخدم العادي (الطالب) كمثال
        return redirect()->intended(route('courses.index', absolute: false));
    }
}