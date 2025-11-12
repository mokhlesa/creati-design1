<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // تم تغيير حقل الإدخال من 'email' إلى 'login' ليناسب النموذج
        return [
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // =========================================================================
        // ==  منطق المصادقة المخصص: استخدام email أو username  ====================
        // =========================================================================

        // 1. تحديد نوع حقل المصادقة: email أو username
        $loginValue = $this->input('login');
        // إذا كان يحتوي على صيغة بريد إلكتروني، نعتبره 'email'، وإلا نعتبره 'username'
        $loginType = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // 2. تهيئة بيانات الاعتماد
        $credentials = [
            $loginType => $loginValue,
            'password' => $this->input('password'),
        ];
        
        // 3. محاولة تسجيل الدخول
        if (! Auth::attempt($credentials, $this->boolean('remember'))) {
            // فشل المصادقة
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'login' => trans('auth.failed'), // استخدام 'login' كحقل للخطأ
            ]);
        }

        // المصادقة ناجحة
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'login' => trans('auth.throttle', [ // تم تغيير 'email' إلى 'login' هنا أيضاً
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        // تم تغيير 'email' إلى 'login' هنا ليتوافق مع حقل الإدخال
        return Str::transliterate(Str::lower($this->string('login')).'|'.$this->ip());
    }
}