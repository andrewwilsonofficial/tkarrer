@extends('layouts.dashboard-master')
@section('title', config('app.name'))
@section('head')
    @parent
    <link rel="stylesheet" href="{{ asset('dashboard-assets/vendor/css/pages/page-pricing.css') }}">
@endsection
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            الإعدادات
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">
                        الإعدادات
                    </h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if (filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL))
                                <img src="{{ Auth::user()->avatar }}" alt="user-avatar" class="d-block rounded"
                                    height="100" width="100" id="uploadedAvatar" />
                            @else
                                <img src="{{ asset('dashboard-assets/img/avatars/' . Auth::user()->avatar) }}" alt="user-avatar"
                                    class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            @endif
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">
                                        رفع صورة
                                    </span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form method="POST" action="{{ route('settings.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3">
                                    @error('name')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="name" class="form-label">
                                        الإسم
                                    </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="الإسم" autofocus
                                        value="{{ auth()->user()->name }}" required />
                                </div>
                                <div class="mb-3">
                                    @error('email')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="email" class="form-label">
                                        البريد الإلكتروني
                                    </label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="البريد الإلكتروني" value="{{ auth()->user()->email }}"
                                        required />
                                </div>
                                <div class="mb-3">
                                    @error('old_password')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="old_password" class="form-label">
                                        كلمة المرور الحالية
                                    </label>
                                    <input type="password" class="form-control" id="old_password" name="old_password"
                                        placeholder="كلمة المرور الحالية" />
                                </div>
                                <div class="mb-3">
                                    <div class="alert alert-warning text-black">
                                        <i class="bx bx-info-circle"></i>
                                        أترك حقول كلمة المرور فارغة إذا لم ترد تغييرها
                                    </div>
                                    @error('password')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="password" class="form-label">
                                        كلمة المرور الجديدة
                                    </label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="كلمة المرور الجديدة" />
                                </div>
                                <div class="mb-3">
                                    @error('password_confirmation')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label for="password_confirmation" class="form-label">
                                        تأكيد كلمة المرور الجديدة
                                    </label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation"
                                        placeholder="تأكيد كلمة المرور الجديدة" />
                                </div>
                            </div>
                            <input type="file" id="upload" class="account-file-input" hidden=""
                                name="avatar" accept="image/*" />
                            <input type="hidden" name="remove_avatar" value="0">
                            <div class="mt-2 text-center">
                                <button type="submit" class="btn btn-success me-2">
                                    حفظ
                                    <i class="bx bx-save ms-1"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            $('#upload').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#uploadedAvatar').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#removeAvatar').click(function() {
                $('#uploadedAvatar').attr('src', '{{ asset('dashboard-assets/img/avatars/defult-user.webp') }}');
                $('input[name="remove_avatar"]').val(1);
            });
        });
    </script>
@endsection
