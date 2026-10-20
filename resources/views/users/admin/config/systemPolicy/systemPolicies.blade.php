@extends('layouts.userLayout')

@section('title', 'System Policies')

@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">System Policies</h1>
            <p class="page-sub">
                Manage policies, terms, rules, and compliance configurations.
            </p>
        </div>

        <div class="head-actions">
            @if (Auth::user()->hasPermission('policy.create'))
                <a href="{{ route('admin.systemPolicies.create') }}" class="btn btn-primary-b">
                    <i class="fa-solid fa-plus"></i>
                    New Policy
                </a>
            @endif
        </div>
    </div>

    <livewire:tables.policy.system-policy-table />
@endsection
