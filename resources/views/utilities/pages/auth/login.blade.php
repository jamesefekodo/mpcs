@extends('layouts.authLayout')
@section('title', 'Login')
@section('content')

    @include('utilities.pages.auth.include.authPageSliders')

    {{-- RIGHT: Login form --}}
    <section class="login-panel" aria-labelledby="loginTitle">
        <nav class="top-nav" aria-label="Account registration">
            <span>New to the community?</span>

            <a href="#" class="text-decoration-none">
                Join {{ basicSystemInfo()->association_acronym }}

                <svg class="icon" aria-hidden="true">
                    <use href="#arrow-up-right"></use>
                </svg>
            </a>
        </nav>

        <div class="login-content">
            <div class="portal-mark">
                {{ basicSystemInfo()->association_acronym }} MEMBER PORTAL
            </div>

            <h1 id="loginTitle" class="login-title">
                Sign In to Your Account
            </h1>

            <p class="login-description">
                Pick up right where you left off.
            </p>


            <form id="loginForm" action="{{ route('submitLoginRequest') }}" method="POST">
                @csrf

                <div class="field">
                    <label class="field-label" for="email">
                        Username or Email address
                    </label>

                    <input id="email" type="text" name="login_id" value="{{ old('login_id') }}" class="form-input"
                        placeholder="Enter your username or email address" inputmode="email" autocapitalize="none"
                        spellcheck="false" required>
                    <p class="text-danger">{{ $errors->first('login_id') }}</p>
                </div>

                <div class="field">
                    <label class="field-label" for="password">
                        Password
                    </label>

                    <div class="input-wrap">
                        <input id="password" type="password" name="password"
                            class="form-input password-input @error('password') invalid @enderror"
                            placeholder="Enter your password" autocomplete="current-password" required>

                        <button id="passwordToggle" type="button" class="password-toggle" aria-label="Show password"
                            aria-controls="password" aria-pressed="false" hidden>
                            <svg class="icon" aria-hidden="true">
                                <use id="passwordIcon" href="#eye"></use>
                            </svg>
                        </button>
                    </div>
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                </div>

                <div class="form-options">
                    <label class="remember" for="remember">
                        {{-- <input id="remember" type="checkbox" name="remember" value="1" @checked(old('remember'))>

                        <span>Keep me signed in</span> --}}
                    </label>

                    <a class="forgot-link text-decoration-none" href="{{ route('forgotPassword') }}">
                        Forgot password?
                    </a>
                </div>

                <button type="submit" class="submit-button" data-loading-text="Processing... Please wait">
                    <span data-button-text>Pay Now</span>

                    <svg data-button-arrow class="icon" aria-hidden="true">
                        <use href="#arrow-right"></use>
                    </svg>

                    <span data-button-spinner class="spinner" aria-hidden="true" hidden></span>
                </button>

                <span id="formStatus" class="sr-only" role="status" aria-live="polite"></span>
            </form>


            <p class="signup-note">
                A new chapter starts here.
                <a href="{{ route('registrationPage') }}" class="text-decoration-none">Become a member</a>
            </p>
        </div>

        <footer class="login-footer">
            <span>© {{ date('Y') }} {{ basicSystemInfo()->association_acronym }}. All rights reserved.</span>

            <span class="footer-note">
                <svg class="icon" aria-hidden="true">
                    <use href="#shield"></use>
                </svg>

                Member access
            </span>
        </footer>
    </section>

@endsection
