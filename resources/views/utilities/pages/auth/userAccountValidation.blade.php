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
                Verify Your Email
            </h1>

            <p class="login-description">
                Enter the code sent to your email address to confirm it
                and continue setting up your account. </p>


            <form id="loginForm" action="{{ route('verifyUserEmailSubmit') }}" method="POST">
                @csrf

                <div class="field">
                    <label class="field-label" for="email_verification_code">
                        Verification Code
                    </label>

                    <input id="email_verification_code" type="text" name="email_verification_code"
                        value="{{ old('email_verification_code') }}" class="form-input" placeholder="******"
                        inputmode="email_verification_code" autocapitalize="none" spellcheck="false" required>
                    <p class="text-danger">{{ $errors->first('email_verification_code') }}</p>
                </div>


                <button type="submit" class="submit-button" data-loading-text="Processing... Please wait">
                    <span data-button-text>Verify</span>

                    <i class="fas fa-key me-1"></i>


                    <span data-button-spinner class="spinner" aria-hidden="true" hidden></span>
                </button>

                <span id="formStatus" class="sr-only" role="status" aria-live="polite"></span>
            </form>

            <hr>

            <div class="d-flex gap-2 mt-5">
                <a href="{{ route('verifyUserEmailResendOtp') }}" class="btn btn-primary flex-fill py-2">
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
