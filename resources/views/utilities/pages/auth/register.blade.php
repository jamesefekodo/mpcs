@extends('layouts.authLayout')
@section('title', 'Register')
@section('content')

    @include('utilities.pages.auth.include.authPageSliders')

    {{-- RIGHT: Login form --}}
    <section class="login-panel" aria-labelledby="loginTitle">
        <nav class="top-nav" aria-label="Account registration">
            <span>Existing member?</span>

            <a href="#" class="text-decoration-none">
                Log in to your account

                <svg class="icon" aria-hidden="true">
                    <use href="#arrow-up-right"></use>
                </svg>
            </a>
        </nav>

        <div class="login-content">
            <div class="portal-mark">
                JOIN OUR COOPERATIVE
            </div>

            <h1 id="loginTitle" class="login-title">
                Start Building Your Financial Future
            </h1>

            <p class="login-description">
                Join a community dedicated to mutual growth, competitive savings rates, and accessible credit facilities.
            </p>


            <form id="loginForm" action="{{ route('submitUserRegistrationRequest') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="field col-md-6">
                        <label class="field-label" for="username">Username</label>
                        <input id="username" type="text" name="username" value="{{ old('username') }}"
                            class="form-input" placeholder="emekabello" autocapitalize="none" spellcheck="false" required>
                        <p class="text-danger">{{ $errors->first('username') }}</p>
                    </div>

                    <div class="field col-md-6">
                        <label class="field-label" for="email">Email address</label>

                        <input id="email" type="text" name="email" value="{{ old('email') }}" class="form-input"
                            placeholder="emekabello@mail.com" autocapitalize="none" spellcheck="false" required>
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    </div>

                    <div class="field col-md-6">
                        <label class="field-label" for="phone">Phone</label>
                        <input id="phone" type="text" name="phone" value="{{ old('phone') }}" class="form-input"
                            placeholder="+23481090912" autocapitalize="none" spellcheck="false" required>
                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                    </div>

                    <div class="field col-md-6">
                        <label class="field-label" for="referral_code">Referral Code</label>
                        <input id="referral_code" type="text" name="referral_code" value="{{ old('referral_code') }}"
                            class="form-input" placeholder="disabled" autocapitalize="none" spellcheck="false"
                            disabled>
                        <p class="text-danger">{{ $errors->first('referral_code') }}</p>
                    </div>

                    <div class="field col-md-6">
                        <label class="field-label" for="password">
                            Password
                        </label>

                        <div class="input-wrap">
                            <input id="password" type="password" name="password" class="form-input password-input"
                                placeholder="Enter your password" autocomplete="none" required>

                            <button id="passwordToggle" type="button" class="password-toggle" aria-label="Show password"
                                aria-controls="password" aria-pressed="false" hidden>
                                <svg class="icon" aria-hidden="true">
                                    <use id="passwordIcon" href="#eye"></use>
                                </svg>
                            </button>
                        </div>

                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    </div>

                    <div class="field col-md-6">
                        <label class="field-label" for="confirm_password">
                            Confirm Password
                        </label>

                        <div class="input-wrap">
                            <input id="confirm_password" type="password" name="confirm_password"
                                class="form-input password-input" placeholder="Confirm your password" autocomplete="none" required>

                            <button id="confirmPasswordToggle" type="button" class="password-toggle"
                                aria-label="Show confirm password" aria-controls="confirm_password" aria-pressed="false"
                                hidden>
                                <svg class="icon" aria-hidden="true">
                                    <use id="confirmPasswordIcon" href="#eye"></use>
                                </svg>
                            </button>
                        </div>

                        <p class="text-danger">{{ $errors->first('confirm_password') }}</p>
                    </div>
                    <div class="field col-md-12">
                        {{-- Password Rules --}}
                        <div id="password-rules" class="mt-3">
                            <div class="text-bold text-danger text-sm mb-2">
                                Password Requirements:
                            </div>
                            <ul class="list-unstyled">

                                <div class="row">
                                    <div class="col-md-6">
                                        <li id="length-rule" class="rule">
                                            <span class="rule-icon">○</span> Minimum 8 characters
                                        </li>
                                        <li id="uppercase-rule" class="rule">
                                            <span class="rule-icon">○</span> At least one uppercase letter
                                        </li>
                                        <li id="number-rule" class="rule">
                                            <span class="rule-icon">○</span> At least one number
                                        </li>
                                    </div>
                                    <div class="col-md-6">
                                        <li id="lowercase-rule" class="rule">
                                            <span class="rule-icon">○</span> At least one lowercase letter
                                        </li>
                                        <li id="special-char-rule" class="rule">
                                            <span class="rule-icon">○</span> At least one special character or symbol
                                        </li>
                                        <li id="match-rule" class="rule">
                                            <span class="rule-icon">○</span> Passwords must match
                                        </li>
                                    </div>
                                </div>
                            </ul>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const passwordField = document.getElementById('password');
                                    const passwordField2 = document.getElementById('confirm_password');

                                    if (!passwordField || !passwordField2) {
                                        return;
                                    }

                                    const rules = {
                                        length: document.getElementById('length-rule'),
                                        lowercase: document.getElementById('lowercase-rule'),
                                        uppercase: document.getElementById('uppercase-rule'),
                                        special: document.getElementById('special-char-rule'),
                                        number: document.getElementById('number-rule'),
                                        match: document.getElementById('match-rule')
                                    };

                                    function updateRule(element, valid) {
                                        if (!element) return;

                                        element.classList.toggle('is-valid', valid);

                                        const icon = element.querySelector('.rule-icon');

                                        if (icon) {
                                            icon.textContent = valid ? '✓' : '○';
                                        }
                                    }

                                    function validatePassword() {
                                        const value = passwordField.value;

                                        updateRule(rules.length, value.length >= 8);
                                        updateRule(rules.lowercase, /[a-z]/.test(value));
                                        updateRule(rules.uppercase, /[A-Z]/.test(value));
                                        updateRule(rules.special, /[^A-Za-z0-9]/.test(value));
                                        updateRule(rules.number, /\d/.test(value));

                                        matchPasswords();
                                    }

                                    function matchPasswords() {
                                        const passwordValue = passwordField.value;
                                        const confirmPasswordValue = passwordField2.value;

                                        // Do not show a match until both fields contain a password.
                                        const passwordsMatch =
                                            passwordValue.length > 0 &&
                                            confirmPasswordValue.length > 0 &&
                                            passwordValue === confirmPasswordValue;

                                        updateRule(rules.match, passwordsMatch);
                                    }

                                    passwordField.addEventListener('input', validatePassword);
                                    passwordField2.addEventListener('input', matchPasswords);

                                    // Also validate prefilled values, if any.
                                    validatePassword();
                                });
                            </script>
                        </div>
                    </div>
                </div>


                <button type="submit" class="submit-button" data-loading-text="Processing... Please wait">
                    <span data-button-text>Submit</span>

                    <i class="fas fa-circle-check me-1"></i>

                    <span data-button-spinner class="spinner" aria-hidden="true" hidden></span>
                </button>

                <span id="formStatus" class="sr-only" role="status" aria-live="polite"></span>
            </form>


            <p class="signup-note">
                Already registered?
                <a href="{{ route('loginPage') }}" class="text-decoration-none">Sign in to your account</a>
            </p>
        </div>

        @include('utilities.pages.auth.include.loginFooter')

    </section>

@endsection
