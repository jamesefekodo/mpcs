<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ associationLogo() }}">


    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#09234b">

    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="manifest" href="{{ asset('manifest.json') }}">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.min.css">

    <!-- Toastr CSS and JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <title>
        @yield('title') | {{ basicSystemInfo()?->association_acronym ?? config('app.name') }}
        {{-- {{ config('app.name') }} --}}
    </title>

    @yield('style')
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
        @include('layouts.include.supportModal')


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

            // /*
            //  * SUBMIT FEEDBACK
            //  */
            // const form = document.getElementById('loginForm');
            // const button = document.getElementById('submitButton');
            // const text = document.getElementById('submitText');
            // const arrow = document.getElementById('submitArrow');
            // const spinner = document.getElementById('submitSpinner');
            // const status = document.getElementById('formStatus');

            // form.addEventListener('submit', (event) => {
            //     if (button.disabled) {
            //         event.preventDefault();
            //         return;
            //     }

            //     button.disabled = true;
            //     text.textContent = 'Signing in…';

            //     arrow.hidden = true;
            //     spinner.hidden = false;

            //     form.setAttribute('aria-busy', 'true');
            //     status.textContent = 'Signing in. Please wait.';
            // });

            // window.addEventListener('pageshow', () => {
            //     button.disabled = false;
            //     text.textContent = 'Sign in to your account';

            //     arrow.hidden = false;
            //     spinner.hidden = true;

            //     form.removeAttribute('aria-busy');
            //     status.textContent = '';
            // });
        })();
    </script>

    @include('layouts.include.toastrNotificationFunction')

</body>

</html>
