<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate(); // المصادقة تتم الآن في LoginRequest باستخدام email أو username

        $request->session()->regenerate();
        
        // =========================================================================
        // ==  منطق إعادة التوجيه المخصص بناءً على الدور  ==========================
        // =========================================================================
        $roleId = Auth::user()->role_id;

        if ($roleId === 1) { // 1: المدير (Admin)
            return redirect()->intended(route('admin.dashboard', absolute: false));
        }

        // يمكن إضافة شروط أخرى هنا
        // if ($roleId === 2) { // 2: المعلم (Instructor)
        //     return redirect()->intended(route('instructor.dashboard', absolute: false));
        // }
        
        // الافتراضي (3: الطالب) أو أي مستخدم آخر
        return redirect()->intended(route('courses.index', absolute: false)); 
    }
    
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
