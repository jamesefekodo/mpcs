@php
    /*
     * Replace these with your actual authentication routes.
     */
    $loginAction = url('/login');
    $registerUrl = url('/register');
    $forgotPasswordUrl = url('/forgot-password');

    /*
     * Optional Google OAuth URL.
     * Leave null if it is not implemented.
     */
    $googleLoginUrl = null;

    /*
     * Your own logo:
     * public/assets/images/gimms-logo.png
     */
    $logoPath = 'assets/images/gimms-logo.png';
    $hasLogo = is_file(public_path($logoPath));
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#09234b">

    <title>Sign in · GIMMS</title>

    <style>
        :root {
            --navy: #09234b;
            --navy-deep: #06172f;

            --orange: #f47721;
            --orange-hover: #df6514;

            --green: #00875e;
            --green-light: #e9f5ef;

            --ink: #14273e;
            --muted: #748093;
            --line: #e3e8ef;

            --surface: #ffffff;
            --background: #f4f7fa;

            --danger: #ad352b;
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: var(--ink);
            background: var(--surface);

            font-family:
                Inter,
                "Segoe UI",
                -apple-system,
                BlinkMacSystemFont,
                sans-serif;

            -webkit-font-smoothing: antialiased;
        }

        button,
        input {
            font: inherit;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            cursor: pointer;
        }

        button:disabled {
            cursor: wait;
        }

        button,
        input,
        a {
            -webkit-tap-highlight-color: transparent;
        }

        [hidden] {
            display: none !important;
        }

        :focus-visible {
            outline: 3px solid var(--orange);
            outline-offset: 5px;
        }

        .icon {
            display: block;
            width: 20px;
            height: 20px;

            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;

            padding: 0;
            margin: -1px;

            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        /* PAGE */

        .auth-layout {
            display: grid;
            grid-template-columns: minmax(0, 1.12fr) minmax(0, 1fr);

            min-height: 100vh;
            min-height: 100svh;
        }

        /* PHOTOGRAPHIC PANEL */

        .visual-panel {
            position: relative;
            isolation: isolate;
            overflow: hidden;

            min-height: 800px;

            color: #ffffff;
            background: var(--navy-deep);

            touch-action: pan-y;
        }

        .visual-header {
            position: absolute;
            z-index: 5;

            top: 40px;
            left: 48px;
            right: 48px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
        }

        .logo-frame {
            display: grid;
            place-items: center;

            width: 60px;
            height: 60px;

            padding: 5px;
            border-radius: 15px;

            background: #ffffff;
        }

        .logo-frame img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .logo-letter {
            color: var(--navy);
            font-size: 32px;
            font-weight: 850;
            letter-spacing: -3px;
        }

        .brand-name {
            display: block;

            font-size: 20px;
            font-weight: 750;
            letter-spacing: -.5px;
        }

        .brand-subtitle {
            display: block;

            max-width: 175px;
            margin-top: 5px;

            color: rgba(255, 255, 255, .72);

            font-size: 8px;
            line-height: 1.7;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .header-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 10px 13px;

            color: rgba(255, 255, 255, .9);
            background: rgba(255, 255, 255, .07);

            border: 1px solid rgba(255, 255, 255, .2);
            border-radius: 30px;

            font-size: 10px;
        }

        .header-link:hover {
            background: rgba(255, 255, 255, .14);
        }

        .header-link .icon {
            width: 13px;
            height: 13px;
        }

        .slides {
            position: absolute;
            inset: 0;
        }

        .slide {
            position: absolute;
            inset: 0;

            overflow: hidden;

            opacity: 0;
            visibility: hidden;
            pointer-events: none;

            transition:
                opacity .9s ease,
                visibility .9s ease;
        }

        .slide.is-active {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        .slide-image {
            position: absolute;
            inset: 0;

            width: 100%;
            height: 100%;

            object-fit: cover;
            object-position: center;

            filter: saturate(.85);
            transform: scale(1.07);

            transition: transform 8s linear;
        }

        .slide.is-active .slide-image {
            transform: scale(1);
        }

        .slide-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(180deg,
                    rgba(4, 20, 44, .60) 0%,
                    rgba(4, 20, 44, .08) 28%,
                    rgba(4, 20, 44, .35) 48%,
                    rgba(4, 20, 44, .96) 100%),
                linear-gradient(90deg,
                    rgba(4, 20, 44, .28),
                    transparent 85%);
        }

        .slide-content {
            position: absolute;
            z-index: 2;

            left: 52px;
            right: 45px;
            bottom: 165px;

            max-width: 600px;
        }

        .slide-eyebrow,
        .slide-title,
        .slide-description {
            opacity: 0;
            transform: translateY(20px);

            transition:
                opacity .7s ease,
                transform .7s ease;
        }

        .is-active .slide-eyebrow,
        .is-active .slide-title,
        .is-active .slide-description {
            opacity: 1;
            transform: translateY(0);
        }

        .is-active .slide-title {
            transition-delay: .12s;
        }

        .is-active .slide-description {
            transition-delay: .24s;
        }

        .slide-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            margin: 0 0 23px;

            color: #ffffff;

            font-size: 10px;
            font-weight: 550;
            letter-spacing: .15em;
            text-transform: uppercase;
        }

        .slide-eyebrow::before {
            content: "";

            width: 7px;
            height: 7px;

            border-radius: 50%;
            background: var(--orange);
        }

        .slide-title {
            margin: 0;

            font-size: clamp(48px, 4.8vw, 77px);
            line-height: 1.04;
            font-weight: 600;
            letter-spacing: -.065em;
        }

        .slide-title span {
            display: block;
            margin-top: 7px;
            color: #ffffff;
        }

        .slide-description {
            max-width: 365px;

            margin: 25px 0 0;

            color: rgba(255, 255, 255, .76);

            font-size: 13px;
            line-height: 1.9;
        }

        /* Slider navigation */

        .visual-footer {
            position: absolute;
            z-index: 5;

            left: 48px;
            right: 48px;
            bottom: 32px;

            padding-top: 21px;

            border-top: 1px solid rgba(255, 255, 255, .22);
        }

        .footer-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .slide-caption {
            color: rgba(255, 255, 255, .72);
            font-size: 11px;
        }

        .slider-controls {
            display: flex;
            gap: 7px;
        }

        .control-button {
            display: grid;
            place-items: center;

            width: 33px;
            height: 33px;

            padding: 0;

            color: #ffffff;
            background: rgba(255, 255, 255, .04);

            border: 1px solid rgba(255, 255, 255, .28);
            border-radius: 50%;

            transition: background .2s ease;
        }

        .control-button:hover {
            background: rgba(255, 255, 255, .16);
        }

        .control-button .icon {
            width: 14px;
            height: 14px;
        }

        .pagination {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-top: 16px;
        }

        .slide-dot {
            position: relative;

            height: 19px;
            flex: 1;

            padding: 0;
            border: 0;
            border-radius: 3px;

            background: transparent;
        }

        .slide-dot::before {
            content: "";
            position: absolute;

            top: 8px;
            left: 0;
            right: 0;

            height: 2px;
            background: rgba(255, 255, 255, .25);
        }

        .slide-dot.is-active::before {
            background: var(--orange);
        }

        .slide-count {
            margin-left: 10px;

            color: rgba(255, 255, 255, .6);
            font-size: 9px;
            letter-spacing: .08em;

            white-space: nowrap;
        }

        .slide-count-current {
            color: #ffffff;
        }

        /* LOGIN PANEL */

        .login-panel {
            position: relative;

            display: flex;
            flex-direction: column;

            min-width: 0;
            padding: 39px 45px 24px;

            background: #ffffff;
        }

        .top-nav {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 9px;

            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .top-nav a {
            display: inline-flex;
            align-items: center;
            gap: 6px;

            color: var(--navy);
            font-weight: 650;
        }

        .top-nav a:hover {
            color: var(--green);
        }

        .top-nav .icon {
            width: 13px;
            height: 13px;
        }

        .login-content {
            width: 100%;
            max-width: 390px;

            margin: auto;
            padding: 57px 0;
        }

        .portal-mark {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            margin-bottom: 28px;

            padding: 7px 11px;

            color: #14754f;
            background: var(--green-light);

            border-radius: 30px;

            font-size: 9px;
            font-weight: 600;
            letter-spacing: .03em;
        }

        .portal-mark::before {
            content: "";

            width: 5px;
            height: 5px;

            background: var(--green);
            border-radius: 50%;
        }

        .mobile-logo {
            display: none;
        }

        .login-title {
            margin: 0;

            color: var(--navy);

            font-size: clamp(39px, 3.5vw, 49px);
            font-weight: 650;
            line-height: 1.12;
            letter-spacing: -.065em;
        }

        .login-description {
            margin: 15px 0 34px;

            color: var(--muted);

            font-size: 13px;
            line-height: 1.8;
        }

        .field {
            margin-bottom: 22px;
        }

        .field-label {
            display: block;
            margin-bottom: 9px;

            color: #35475b;

            font-size: 11px;
            font-weight: 650;
        }

        .input-wrap {
            position: relative;
        }

        .form-input {
            display: block;

            width: 100%;
            height: 55px;

            padding: 0 16px;

            color: var(--ink);
            background: #fbfcfd;

            border: 1px solid #e0e6ed;
            border-radius: 10px;

            font-size: 13px;

            transition:
                border-color .2s ease,
                background .2s ease,
                box-shadow .2s ease;
        }

        .form-input::placeholder {
            color: #9ba5b3;
        }

        .form-input:hover {
            border-color: #b9c7d7;
        }

        .form-input:focus {
            outline: none;

            background: #ffffff;
            border-color: #748eaf;
            box-shadow: 0 0 0 4px rgba(9, 35, 75, .045);
        }

        .form-input.invalid {
            border-color: #d18e83;
        }

        .password-input {
            padding-right: 52px;
        }

        .password-toggle {
            position: absolute;
            top: 8px;
            right: 7px;

            display: grid;
            place-items: center;

            width: 39px;
            height: 39px;

            padding: 0;

            color: #8492a5;
            background: transparent;

            border: 0;
            border-radius: 7px;
        }

        .password-toggle:hover {
            color: var(--navy);
            background: #edf2f8;
        }

        .password-toggle .icon {
            width: 18px;
            height: 18px;
        }

        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;

            margin: 2px 0 27px;

            font-size: 11px;
        }

        .remember {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            color: #758195;
            cursor: pointer;
        }

        .remember input {
            width: 15px;
            height: 15px;
            margin: 0;

            accent-color: var(--green);
        }

        .forgot-link {
            color: var(--navy);
            font-weight: 600;
        }

        .forgot-link:hover {
            color: var(--green);
        }

        .submit-button {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;

            width: 100%;
            min-height: 55px;

            padding: 15px 20px;

            color: #ffffff;
            background: var(--orange);

            border: 0;
            border-radius: 10px;

            font-size: 13px;
            font-weight: 650;

            box-shadow: 0 7px 17px rgba(244, 119, 33, .14);

            transition:
                background .2s ease,
                transform .2s ease;
        }

        .submit-button:hover:not(:disabled) {
            background: var(--orange-hover);
            transform: translateY(-1px);
        }

        .submit-button:disabled {
            opacity: .75;
        }

        .submit-button .icon {
            width: 17px;
            height: 17px;
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 14px;

            margin: 25px 0;

            color: #9aa4b1;
            font-size: 10px;
        }

        .divider::before,
        .divider::after {
            content: "";
            height: 1px;
            flex: 1;
            background: var(--line);
        }

        .google-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 11px;

            width: 100%;
            min-height: 52px;

            padding: 13px 18px;

            color: #40536b;
            background: #ffffff;

            border: 1px solid #dfe6ee;
            border-radius: 10px;

            font-size: 12px;
            font-weight: 550;

            transition: background .2s ease;
        }

        .google-button:hover {
            background: #f3f6fa;
        }

        .google-icon {
            width: 18px;
            height: 18px;
        }

        .signup-note {
            margin: 29px 0 0;

            text-align: center;

            color: #8b96a5;
            font-size: 11px;
            line-height: 1.8;
        }

        .signup-note a {
            margin-left: 4px;

            color: var(--navy);
            font-weight: 650;

            text-decoration: underline;
            text-decoration-color: #c2cfdf;
            text-underline-offset: 4px;
        }

        .login-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;

            padding-top: 18px;
            border-top: 1px solid #edf0f4;

            color: #97a1ae;

            font-size: 9px;
            line-height: 1.8;
        }

        .footer-note {
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .footer-note .icon {
            width: 12px;
            height: 12px;
            color: #7d8d9e;
        }

        /* ALERTS */

        .alert {
            margin-bottom: 21px;
            padding: 12px 14px;

            border: 1px solid;
            border-radius: 9px;

            font-size: 12px;
            line-height: 1.7;
        }

        .alert-error {
            color: var(--danger);
            background: #fff1ed;
            border-color: #f2d8ce;
        }

        .alert-success {
            color: #216a47;
            background: #edf7f0;
            border-color: #d3e8da;
        }

        .field-error {
            margin: 7px 0 0;

            color: var(--danger);

            font-size: 11px;
            line-height: 1.6;
        }

        .spinner {
            width: 17px;
            height: 17px;

            border: 2px solid rgba(255, 255, 255, .35);
            border-top-color: #ffffff;
            border-radius: 50%;

            animation: spin .7s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* RESPONSIVE */

        @media (min-width: 1700px) {
            .auth-layout {
                max-width: 2000px;
                margin: auto;
            }

            .slide-content {
                left: 75px;
                right: 65px;
            }

            .visual-header,
            .visual-footer {
                left: 65px;
                right: 65px;
            }
        }

        @media (max-width: 1100px) {

            .visual-header,
            .visual-footer {
                left: 32px;
                right: 32px;
            }

            .slide-content {
                left: 35px;
                right: 35px;
            }

            .slide-title {
                font-size: 57px;
            }

            .login-panel {
                padding-left: 30px;
                padding-right: 30px;
            }

            .header-link {
                display: none;
            }
        }

        @media (max-width: 850px) {
            .auth-layout {
                grid-template-columns: .95fr 1fr;
            }

            .visual-header {
                top: 30px;
                left: 25px;
                right: 25px;
            }

            .logo-frame {
                width: 48px;
                height: 48px;
                border-radius: 12px;
            }

            .brand-name {
                font-size: 17px;
            }

            .brand-subtitle {
                font-size: 6px;
            }

            .slide-content {
                left: 27px;
                right: 27px;
            }

            .slide-title {
                font-size: 47px;
            }

            .slide-description {
                font-size: 12px;
            }

            .visual-footer {
                left: 25px;
                right: 25px;
            }

            .slide-caption {
                font-size: 9px;
            }

            .login-panel {
                padding-left: 23px;
                padding-right: 23px;
            }

            .top-nav {
                font-size: 10px;
            }
        }

        @media (max-width: 680px) {
            .auth-layout {
                display: block;
            }

            .visual-panel {
                min-height: 430px;
            }

            .visual-header {
                top: 25px;
                left: 25px;
                right: 25px;
            }

            .logo-frame {
                width: 43px;
                height: 43px;
                border-radius: 10px;
            }

            .brand-name {
                font-size: 16px;
            }

            .slide-content {
                left: 27px;
                right: 27px;
                bottom: 124px;
            }

            .slide-eyebrow {
                margin-bottom: 17px;
                font-size: 8px;
            }

            .slide-title {
                font-size: clamp(37px, 8.5vw, 49px);
            }

            .slide-description {
                max-width: 310px;
                margin-top: 18px;

                font-size: 11px;
                line-height: 1.8;
            }

            .visual-footer {
                left: 25px;
                right: 25px;
                bottom: 18px;

                padding-top: 13px;
            }

            .control-button {
                width: 29px;
                height: 29px;
            }

            .pagination {
                margin-top: 8px;
            }

            .login-panel {
                padding: 25px 26px 20px;
            }

            .top-nav {
                justify-content: center;
                font-size: 11px;
            }

            .login-content {
                padding: 37px 0;
            }

            .login-title {
                font-size: 41px;
            }

            .portal-mark {
                margin-bottom: 22px;
            }

            .form-input {
                font-size: 16px;
            }

            .login-footer {
                width: 100%;
                max-width: 390px;
                margin: auto;
            }
        }

        @media (max-width: 360px) {
            .visual-panel {
                min-height: 455px;
            }

            .slide-title {
                font-size: 35px;
            }

            .login-panel {
                padding-left: 20px;
                padding-right: 20px;
            }

            .form-options {
                font-size: 10px;
            }
        }

        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>

<body>

    {{-- Shared SVG icons --}}
    <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" aria-hidden="true" style="position:absolute;">
        <defs>
            <symbol id="arrow-right" viewBox="0 0 24 24">
                <path d="M5 12h14" />
                <path d="m12 5 7 7-7 7" />
            </symbol>

            <symbol id="arrow-up-right" viewBox="0 0 24 24">
                <path d="M7 17 17 7M7 7h10v10" />
            </symbol>

            <symbol id="chevron-left" viewBox="0 0 24 24">
                <path d="m15 18-6-6 6-6" />
            </symbol>

            <symbol id="chevron-right" viewBox="0 0 24 24">
                <path d="m9 18 6-6-6-6" />
            </symbol>

            <symbol id="pause" viewBox="0 0 24 24">
                <path d="M9 5v14M15 5v14" />
            </symbol>

            <symbol id="play" viewBox="0 0 24 24">
                <path d="m8 5 11 7-11 7V5Z" />
            </symbol>

            <symbol id="eye" viewBox="0 0 24 24">
                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z" />
                ircle cx="12" cy="12" r="3"/>
            </symbol>

            <symbol id="eye-off" viewBox="0 0 24 24">
                <path d="m3 3 18 18" />
                <path d="M10.6 10.6a2 2 0 0 0 2.8 2.8" />
                <path d="M9.9 5.2A12 12 0 0 1 12 5c6.5 0 10 7 10 7a19 19 0 0 1-3.1 4" />
                <path d="M6.3 6.3A20 20 0 0 0 2 12s3.5 7 10 7a12 12 0 0 0 5.7-1.7" />
            </symbol>

            <symbol id="shield" viewBox="0 0 24 24">
                <path d="M12 22s8-4 8-11V5l-8-3-8 3v6c0 7 8 11 8 11Z" />
                <path d="m8 12 3 3 5-6" />
            </symbol>
        </defs>
    </svg>

    <main class="auth-layout">

            @yield('content')

    </main>

    <script>
        (() => {
            /*
             * SLIDER
             */
            const slider = document.getElementById('storySlider');
            const slides = [...slider.querySelectorAll('.slide')];
            const dots = [...slider.querySelectorAll('.slide-dot')];

            const previous = document.getElementById('previousSlide');
            const next = document.getElementById('nextSlide');

            const autoplayButton = document.getElementById('toggleAutoplay');
            const autoplayIcon = document.getElementById('autoplayIcon');

            const caption = document.getElementById('slideCaption');
            const counter = document.getElementById('slideNumber');
            const announcement = document.getElementById('slideAnnouncement');

            const motionPreference = window.matchMedia(
                '(prefers-reduced-motion: reduce)'
            );

            const interval = 7000;

            let current = 0;
            let timer = null;

            let autoplayEnabled = !motionPreference.matches;
            let pointerInside = false;
            let focusInside = false;
            let touchStart = null;

            document.getElementById('sliderControls').hidden = false;
            document.getElementById('sliderPagination').hidden = false;

            /*
             * Hide a failed image and keep the navy fallback.
             */
            slider.querySelectorAll('.slide-image').forEach((image) => {
                const hideFailedImage = () => {
                    image.hidden = true;
                };

                image.addEventListener('error', hideFailedImage);

                if (image.complete && image.naturalWidth === 0) {
                    hideFailedImage();
                }
            });

            function stopTimer() {
                window.clearTimeout(timer);
                timer = null;
            }

            function updateAutoplayButton() {
                autoplayButton.setAttribute(
                    'aria-label',
                    autoplayEnabled ? 'Pause slideshow' : 'Play slideshow'
                );

                autoplayIcon.setAttribute(
                    'href',
                    autoplayEnabled ? '#pause' : '#play'
                );
            }

            function scheduleNext() {
                stopTimer();

                if (
                    !autoplayEnabled ||
                    pointerInside ||
                    focusInside ||
                    touchStart ||
                    document.hidden
                ) {
                    return;
                }

                timer = window.setTimeout(() => {
                    showSlide(current + 1);
                }, interval);
            }

            function showSlide(index, manual = false) {
                current = (index + slides.length) % slides.length;

                slides.forEach((slide, position) => {
                    const active = position === current;

                    slide.classList.toggle('is-active', active);
                    slide.setAttribute('aria-hidden', String(!active));
                });

                dots.forEach((dot, position) => {
                    const active = position === current;

                    dot.classList.toggle('is-active', active);
                    dot.setAttribute('aria-current', String(active));
                });

                counter.textContent = String(current + 1).padStart(2, '0');
                caption.textContent = slides[current].dataset.caption;

                if (manual) {
                    const title = slides[current]
                        .querySelector('.slide-title')
                        .textContent
                        .replace(/\s+/g, ' ')
                        .trim();

                    announcement.textContent =
                        `Slide ${current + 1} of ${slides.length}: ${title}`;
                }

                scheduleNext();
            }

            previous.addEventListener('click', () => {
                showSlide(current - 1, true);
            });

            next.addEventListener('click', () => {
                showSlide(current + 1, true);
            });

            dots.forEach((dot) => {
                dot.addEventListener('click', () => {
                    showSlide(Number(dot.dataset.slide), true);
                });
            });

            autoplayButton.addEventListener('click', () => {
                autoplayEnabled = !autoplayEnabled;

                updateAutoplayButton();
                scheduleNext();
            });

            slider.addEventListener('mouseenter', () => {
                pointerInside = true;
                stopTimer();
            });

            slider.addEventListener('mouseleave', () => {
                pointerInside = false;
                scheduleNext();
            });

            slider.addEventListener('focusin', () => {
                focusInside = true;
                stopTimer();
            });

            slider.addEventListener('focusout', (event) => {
                if (!slider.contains(event.relatedTarget)) {
                    focusInside = false;
                    scheduleNext();
                }
            });

            slider.addEventListener('keydown', (event) => {
                if (event.key === 'ArrowLeft') {
                    event.preventDefault();
                    showSlide(current - 1, true);
                }

                if (event.key === 'ArrowRight') {
                    event.preventDefault();
                    showSlide(current + 1, true);
                }
            });

            slider.addEventListener('touchstart', (event) => {
                if (event.touches.length !== 1) {
                    touchStart = null;
                    return;
                }

                touchStart = {
                    x: event.touches[0].clientX,
                    y: event.touches[0].clientY
                };

                stopTimer();
            }, {
                passive: true
            });

            slider.addEventListener('touchend', (event) => {
                if (!touchStart) {
                    scheduleNext();
                    return;
                }

                const touch = event.changedTouches[0];

                const deltaX = touch.clientX - touchStart.x;
                const deltaY = touch.clientY - touchStart.y;

                touchStart = null;

                if (
                    Math.abs(deltaX) > 50 &&
                    Math.abs(deltaX) > Math.abs(deltaY)
                ) {
                    showSlide(current + (deltaX < 0 ? 1 : -1), true);
                } else {
                    scheduleNext();
                }
            }, {
                passive: true
            });

            slider.addEventListener('touchcancel', () => {
                touchStart = null;
                scheduleNext();
            });

            document.addEventListener('visibilitychange', scheduleNext);

            motionPreference.addEventListener('change', (event) => {
                if (event.matches) {
                    autoplayEnabled = false;
                    updateAutoplayButton();
                    stopTimer();
                }
            });

            updateAutoplayButton();
            scheduleNext();

            /*
             * PASSWORD VISIBILITY
             */
            const password = document.getElementById('password');
            const passwordToggle = document.getElementById('passwordToggle');
            const passwordIcon = document.getElementById('passwordIcon');

            passwordToggle.hidden = false;

            passwordToggle.addEventListener('click', () => {
                const visible = password.type === 'password';

                password.type = visible ? 'text' : 'password';

                passwordToggle.setAttribute(
                    'aria-label',
                    visible ? 'Hide password' : 'Show password'
                );

                passwordToggle.setAttribute(
                    'aria-pressed',
                    String(visible)
                );

                passwordIcon.setAttribute(
                    'href',
                    visible ? '#eye-off' : '#eye'
                );
            });

            /*
             * SUBMIT FEEDBACK
             */
            const form = document.getElementById('loginForm');
            const button = document.getElementById('submitButton');
            const text = document.getElementById('submitText');
            const arrow = document.getElementById('submitArrow');
            const spinner = document.getElementById('submitSpinner');
            const status = document.getElementById('formStatus');

            form.addEventListener('submit', (event) => {
                if (button.disabled) {
                    event.preventDefault();
                    return;
                }

                button.disabled = true;
                text.textContent = 'Signing in…';

                arrow.hidden = true;
                spinner.hidden = false;

                form.setAttribute('aria-busy', 'true');
                status.textContent = 'Signing in. Please wait.';
            });

            window.addEventListener('pageshow', () => {
                button.disabled = false;
                text.textContent = 'Sign in to your account';

                arrow.hidden = false;
                spinner.hidden = true;

                form.removeAttribute('aria-busy');
                status.textContent = '';
            });
        })();
    </script>
</body>

</html>
