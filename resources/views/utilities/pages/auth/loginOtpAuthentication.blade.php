@extends('layouts.authLayout')
@section('title', 'Verify Email')
@section('content')

    @include('utilities.pages.auth.include.authPageSliders')

    {{-- RIGHT: Login form --}}
    <section class="login-panel" aria-labelledby="loginTitle">


        <div class="login-content">
            <div class="portal-mark">
                {{ basicSystemInfo()->association_acronym }} MEMBER PORTAL
            </div>

            <h1 id="loginTitle" class="login-title">
                Confirm Your Sign-In
            </h1>

            <p class="login-description">
                Enter the verification code sent to your email address to securely complete your sign-in.</p>


            <form id="loginForm" action="{{ route('verifyLoginOtpSubmit') }}" method="POST">
                @csrf

                <div class="field">
                    <label class="field-label" for="login_otp">
                        Verification Code
                    </label>

                    <input id="login_otp" type="text" name="login_otp"
                        value="{{ old('login_otp') }}" class="form-input" placeholder="******"
                        inputmode="login_otp" autocapitalize="none" spellcheck="false" required>
                    <p class="text-danger">{{ $errors->first('login_otp') }}</p>
                </div>


                <button type="submit" class="submit-button" data-loading-text="Processing... Please wait">
                    <span data-button-text>Confirm</span>

                    <i class="fas fa-key me-1"></i>


                    <span data-button-spinner class="spinner" aria-hidden="true" hidden></span>
                </button>

                <span id="formStatus" class="sr-only" role="status" aria-live="polite"></span>
            </form>

            <hr>

            <div class="d-flex gap-2 mt-5">
                <a href="{{ route('resendLoginOtp') }}" class="btn btn-primary flex-fill py-2">
                    <i class="fas fa-rotate-right me-2"></i>
                    Resend OTP
                </a>

                <a href="{{ route('logoutRequest') }}" class="btn btn-outline-danger flex-fill py-2">
                    <i class="fas fa-right-from-bracket me-2"></i>
                    Logout
                </a>

            </div>
        </div>

        @include('utilities.pages.auth.include.loginFooter')

    </section>

@endsection
