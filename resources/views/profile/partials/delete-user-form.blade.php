<section>
    <header>
        <h4 class="fw-bold text-danger">{{ __('حذف الحساب') }}</h4>
        <p class="text-muted">{{ __('بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته بشكل دائم. قبل حذف حسابك، يرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها.') }}</p>
    </header>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-user-deletion-modal">
        {{ __('حذف الحساب') }}
    </button>

    <!-- Modal -->
    <div class="modal fade" id="confirm-user-deletion-modal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('هل أنت متأكد أنك تريد حذف حسابك؟') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted">
                            {{ __('بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته بشكل دائم. يرجى إدخال كلمة المرور الخاصة بك لتأكيد رغبتك في حذف حسابك بشكل دائم.') }}
                        </p>
                        <div class="mt-3">
                            <label for="password-delete" class="form-label visually-hidden">{{ __('كلمة المرور') }}</label>
                            <input id="password-delete" name="password" type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" placeholder="{{ __('كلمة المرور') }}">
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('إلغاء') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('حذف الحساب') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@if($errors->userDeletion->isNotEmpty())
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('confirm-user-deletion-modal'));
            myModal.show();
        });
    </script>
    @endpush
@endif