@extends('layouts.authLayout')
@section('title', 'Maintenance')
@section('content')

    @include('utilities.pages.auth.include.authPageSliders')

    {{-- RIGHT: Login form --}}
    <section class="login-panel" aria-labelledby="loginTitle">

        <div class="login-content">
            <div class="portal-mark">
                {{ basicSystemInfo()->association_acronym }} MEMBER PORTAL
            </div>

            <h1 id="loginTitle" class="login-title">
                We’ll be back shortly.
            </h1>

            <h5 class="text-muted my-3">
                We’re making a few improvements to your GIMMS experience. The member portal is temporarily unavailable while
                we work. Please check back later. Thank you for bearing with us.
            </h5>

            <div class="d-flex gap-2 mt-4">
                <a href="{{ url()->current() }}" class="btn btn-primary flex-fill py-2">
                    <i class="fas fa-rotate-right me-2"></i>
                    Refresh
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
