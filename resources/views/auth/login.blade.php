@extends('auth.master')
@section('title', config('app.name') . ' - تسجيل الدخول')
@section('head')
    @parent
    <style>
        /* Center align the container */
        .text-center {
            text-align: center;
        }

        /* Add some top margin */
        .mt-3 {
            margin-top: 1rem;
        }

        /* Style the paragraph text */
        .text-center p {
            margin-bottom: 0.5rem;
            color: #888;
        }

        /* Style the Google sign-in button */
        .login-with-google-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #fff;
            color: #000;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .login-with-google-btn:hover {
            background-color: #f8f8f8;
        }

        .login-with-google-btn:active {
            background-color: #f2f2f2;
        }

        /* Style the Google icon */
        .login-with-google-btn svg {
            display: inline-block;
            margin-right: 0.5rem;
            width: 24px;
            /* Set the width and height of the SVG icon as needed */
            height: 24px;
            fill: #000;
            /* Set the color of the SVG icon */
        }
    </style>
@endsection
@section('content')
    <!-- Content -->
    <div class="authentication-wrapper authentication-cover">
        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-6 col-xl-6 align-items-center">
                <div class="flex-row text-center mx-auto">
                    <img src="{{ asset('assets/images/logo-black.svg') }}" alt="" width="520"
                        class="img-fluid authentication-cover-img" />
                </div>
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div class="d-flex col-12 col-lg-6 col-xl-6 align-items-center authentication-bg p-sm-5 p-4">
                <div class="w-px-400 mx-auto">
                    <!-- Logo -->
                    <div class="app-brand mb-4">
                        <a href="#" class="app-brand-link gap-2 mb-2">
                            <span class="app-brand-text demo h3 mb-0 fw-bold">
                                مرحبا بك
                            </span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h5 class="mb-2">
                        يرجي تسجيل الدخول للمتابعة
                    </h5>
                    <p class="mb-4">
                    </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="email" class="form-label">
                                البريد الالكتروني
                            </label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="البريد الالكتروني"
                                autofocus="" />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">
                                    كلمة المرور
                                </label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="كلمة المرور" aria-describedby="password"
                                    autocomplete="current-password" />
                                <span class="input-group-text cursor-pointer">
                                    <i class="bx bx-hide"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember">
                                    تذكرني
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-primary d-grid w-100">
                            تسجيل الدخول    
                        </button>
                    </form>
                </div>
            </div>
            <!-- /Login -->
        </div>
    </div>
    <!-- / Content -->
@endsection
