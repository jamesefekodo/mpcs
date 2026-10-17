@extends('layouts.emailLayout')
@section('content')
    <p>
        Hello,
    </p>

    <p>
        Welcome to {{ basicSystemInfo()->association_name ?? '-' }} ({{ basicSystemInfo()->association_acronym ?? '-' }})!
        We’re pleased to have you take the first step toward joining our community.
    </p>

    <p style="margin-bottom: 1px; padding-bottom:0px; color: #df6514">
        Your account has been created successfully with the following details:
    </p>
    <ul>
        <li>Username: {{ $user->username }}</li>
        <li>Email address: {{ $user->email }}</li>
        <li>Password: Use the password you created during registration.</li>
    </ul>

    <p>
        <span style="font-weight: bold; padding-bottom:0; margin-bottom:0; color: #df6514">
            Your journey has just begun
        </span> <br>
        Creating your account is the first step. There are still a few things to complete before your membership setup is
        finished.
    </p>

    <p style="margin-bottom: 1px; padding-bottom:0px; color: #df6514">
        Sign in to your member portal to:
    </p>
    <ul>
        <li>Complete your personal profile.</li>
        <li>Provide any outstanding information or required documents.</li>
        <li>Review the membership requirements and follow the next steps shown on your dashboard.</li>

    </ul>

    <p>
        Your portal will guide you through anything that remains outstanding. Creating an account does not, by itself,
        confirm that all membership requirements have been completed.
    </p>

    <p class="mailLink">

        <a href="{{ route('loginPage') }}" class="link-button">Continue Your Registration</a>
    </p>

    <p>
        <span style="font-weight: bold; padding-bottom:0; margin-bottom:0;">
            A community of shared possibilities
        </span> <br>
        As you complete your membership journey, you’ll learn more about our association’s contributions, loan options,
        product sales programs, and community activities. Access to these services is subject to the applicable membership color: #df6514
        requirements, eligibility criteria, and program terms.
    </p>

    <p>
        {{-- @if (customerSupport() && customerSupport()?->email)
            If you need assistance, contact us at <a
                href="mailto:{{ customerSupport()->email }}">{{ customerSupport()->email }}</a>.
        @else --}}
            If you need assistance, please contact our support channels.
        {{-- @endif --}}
    </p>

    <p>
        We look forward to getting to know you and building a stronger future together.
    </p>
@endsection
