<section>
    <header>
        <h4 class="fw-bold">{{ __('معلومات الملف الشخصي') }}</h4>
        <p class="text-muted">{{ __("قم بتحديث معلومات الملف الشخصي لحسابك وعنوان بريدك الإلكتروني.") }}</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="profile_image" class="form-label">{{ __('الصورة الشخصية') }}</label>
            <input id="profile_image" name="profile_image" type="file" class="form-control @error('profile_image') is-invalid @enderror" accept="image/*">
            @error('profile_image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('الاسم') }}</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('البريد الإلكتروني') }}</label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="small text-muted">
                        {{ __('عنوان بريدك الإلكتروني غير مُحقق.') }}
                        <button form="send-verification" class="btn btn-link p-0 text-decoration-underline">
                            {{ __('انقر هنا لإعادة إرسال بريد التحقق.') }}
                        </button>
                    </p>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 small text-success">{{ __('تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.') }}</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary">{{ __('حفظ') }}</button>
            @if (session('status') === 'profile-updated')
                <p class="text-success m-0">{{ __('تم الحفظ.') }}</p>
            @endif
        </div>
    </form>
</section>