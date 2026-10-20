@extends('layouts.userLayout')

@section('title', $data['policy']->title)

@section('content')
    <div class="page-head">
        <div>
            <h1 class="page-title">{{ $data['policy']->title }}</h1>
            {{-- <p class="page-sub">
                Policy details, applicability, and publication information.
            </p> --}}
        </div>

        <div class="head-actions">
            <a href="{{ route('systemPolicies') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i>
                Back to Policies
            </a>

            @if (Auth::user()->hasPermission('policy.update'))
                <a href="{{ route('admin.systemPolicies.edit', ['slug' => $data['policy']->slug]) }}" class="btn btn-primary">
                    <i class="fa-solid fa-pen"></i>
                    Edit Policy
                </a>
            @endif
            @if (Auth::user()->hasPermission('policy.delete'))

                <button type="button" class="btn btn-danger js-confirm"
                    data-url="{{ route('admin.systemPolicies.delete', ['slug' => $data['policy']->slug]) }}" data-method="DELETE"
                    data-confirm-title="Delete Policy?" data-confirm-text="This policy will be permanently deleted."
                    data-confirm-button="Yes, Delete" data-confirm-icon="warning" data-confirm-color="#d33">
                    <i class="fa-solid fa-trash"></i>
                    Delete Policy
                </button>
            @endif
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom py-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
                <div>
                    <h5 class="card-title mb-1 fw-bold">Policy Details</h5>
                    {{-- <p class="text-muted small mb-0">
                        Reference information, policy statement, and publication details.
                    </p> --}}
                </div>

                @if ($data['policy']->is_active)
                    <span class="badge rounded-pill text-bg-success">
                        <i class="fa-solid fa-circle-check me-1"></i>
                        Active
                    </span>
                @else
                    <span class="badge rounded-pill text-bg-danger">
                        <i class="fa-solid fa-circle-xmark me-1"></i>
                        Inactive
                    </span>
                @endif
            </div>
        </div>

        <div class="card-body">
            {{-- Record summary --}}
            {{-- <div class="record-summary mb-4">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="summary-item">
                            <span class="summary-label">Policy Code</span>
                            <span class="summary-value">
                                {{ $data['policy']->code ?? '—' }}
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="summary-item">
                            <span class="summary-label">Slug</span>
                            <span class="summary-value">
                                {{ $data['policy']->slug ?? '—' }}
                            </span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="summary-item">
                            <span class="summary-label">Published On</span>
                            <span class="summary-value">
                                {{ $data['policy']->published_on?->format('M j, Y') ?? '—' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- Policy statement --}}
            <div class="detail-section mb-4">
                <h6 class="section-title">Policy Statement</h6>

                <div class="rich-text">
                    {!! $data['policy']->policy_statement !!}
                </div>
            </div>

            {{-- Applicability --}}
            <div class="detail-section mb-4">
                <h6 class="section-title">Applicability</h6>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="applicability-item {{ $data['policy']->applicable_to_member ? 'active' : 'muted' }}">
                            <i class="fa-solid fa-users"></i>

                            <div>
                                <div class="fw-semibold">Members</div>
                                <small class="text-muted">
                                    Cooperative members
                                </small>
                            </div>

                            <i
                                class="fa-solid {{ $data['policy']->applicable_to_member ? 'fa-circle-check text-success' : 'fa-circle-xmark text-secondary' }} ms-auto"></i>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div
                            class="applicability-item {{ $data['policy']->applicable_to_administrator ? 'active' : 'muted' }}">
                            <i class="fa-solid fa-user-gear"></i>

                            <div>
                                <div class="fw-semibold">Administrators</div>
                                <small class="text-muted">
                                    Administrators and staff
                                </small>
                            </div>

                            <i
                                class="fa-solid {{ $data['policy']->applicable_to_administrator
                                    ? 'fa-circle-check text-success'
                                    : 'fa-circle-xmark text-secondary' }} ms-auto"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Publication dates --}}
            <div class="detail-section">
                <h6 class="section-title">Publication</h6>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="summary-item">
                            <span class="summary-label">Last Updated On</span>
                            <span class="summary-value">
                                {{ formatDateTime($data['policy']->update_at) }}
                            </span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="summary-item">
                            <span class="summary-label">Created</span>
                            <span class="summary-value">
                                {{ formatDateTime($data['policy']->created_at) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    /* Reusable record summary */
    .record-summary {
        padding: 16px;
        border: 1px solid var(--bs-border-color);
        border-radius: 12px;
        background: var(--bs-tertiary-bg);
    }

    .summary-item {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .summary-label {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
        color: var(--bs-secondary-color);
    }

    .summary-value {
        font-size: 14.5px;
        font-weight: 600;
        color: var(--bs-body-color);
        word-break: break-word;
    }

    /* Reusable section */
    .detail-section {
        padding-bottom: 20px;
        margin-bottom: 20px;
        border-bottom: 1px solid var(--bs-border-color);
    }

    .detail-section:last-child {
        padding-bottom: 0;
        margin-bottom: 0;
        border-bottom: 0;
    }

    .section-title {
        margin-bottom: 12px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: .04em;
        text-transform: uppercase;
        color: var(--bs-secondary-color);
    }

    /* Rich text */
    .rich-text {
        color: var(--bs-body-color);
        font-size: 15px;
        line-height: 1.7;
    }

    .rich-text h1,
    .rich-text h2,
    .rich-text h3 {
        margin-top: 20px;
        margin-bottom: 10px;
        font-weight: 700;
    }

    .rich-text p {
        margin-bottom: 14px;
    }

    .rich-text ul,
    .rich-text ol {
        padding-left: 22px;
        margin-bottom: 14px;
    }

    .rich-text img {
        max-width: 100%;
        border-radius: 10px;
    }

    /* Applicability */
    .applicability-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px;
        border: 1px solid var(--bs-border-color);
        border-radius: 12px;
        background: var(--bs-body-bg);
    }

    .applicability-item>i:first-child {
        font-size: 18px;
        color: var(--bs-primary);
    }

    .applicability-item.muted {
        opacity: .65;
    }
</style>
