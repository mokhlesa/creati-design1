<section>
    <header>
        <h4 class="fw-bold">{{ __('تحديث كلمة المرور') }}</h4>
        <p class="text-muted">{{ __('تأكد من أن حسابك يستخدم كلمة مرور طويلة وعشوائية للبقاء آمنًا.') }}</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="current_password" class="form-label">{{ __('كلمة المرور الحالية') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{ __('كلمة المرور الجديدة') }}</label>
            <input id="password" name="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">{{ __('تأكيد كلمة المرور') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary">{{ __('حفظ') }}</button>
            @if (session('status') === 'password-updated')
                <p class="text-success m-0">{{ __('تم الحفظ.') }}</p>
            @endif
        </div>
    </form>
</section>