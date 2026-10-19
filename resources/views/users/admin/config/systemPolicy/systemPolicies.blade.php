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
            <a
                {{-- href="{{ route('admin.system-policies.create') }}" --}}
                class="btn btn-primary"
            >
                <i class="fa-solid fa-plus"></i>
                New Policy
            </a>
        </div>
    </div>

    <livewire.tables.system-policy-table />
@endsection
