<div class="card shadow-sm border-0">
    <div class="card-header bg-white border-bottom py-3">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
            <div>
                <h5 class="card-title mb-1 fw-bold">System Policies</h5>
                <p class="text-muted small mb-0">
                    {{ $systemPolicies->total() }}
                    {{ $systemPolicies->total() === 1 ? 'policy' : 'policies' }} found
                </p>
            </div>

            <div class="d-flex flex-wrap align-items-center gap-2">
                <div class="input-group input-group-sm" style="max-width: 260px;">
                    <span class="input-group-text bg-white">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </span>

                    <input type="search" class="form-control" placeholder="Search policies..."
                        wire:model.live.debounce.400ms="search">
                </div>

                <select class="form-select form-select-sm" style="max-width: 170px;" wire:model.live="status">
                    <option value="">All Statuses</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

                @if ($search !== '' || $status !== '')
                    <button type="button" class="btn btn-sm btn-outline-secondary" wire:click="resetFilters">
                        <i class="fa-solid fa-rotate-left"></i>
                        Reset
                    </button>
                @endif
            </div>
        </div>
    </div>

    @if ($systemPolicies->isEmpty())
        {{-- Shared empty state --}}
        <div class="card-body text-center py-5">
            <div class="text-muted">
                <i class="fa-solid fa-folder-open fa-2x mb-3"></i>

                <p class="mb-3">
                    No system policies match your search.
                </p>

                <button type="button" class="btn btn-sm btn-outline-secondary" wire:click="resetFilters">
                    <i class="fa-solid fa-rotate-left"></i>
                    Reset Filters
                </button>
            </div>
        </div>
    @else
        {{-- Desktop table --}}
        <div class="policy-desktop">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="data-table-head">
                        <tr>
                            <th scope="col">S/N</th>

                            <th scope="col">
                                <button type="button" class="table-sort {{ $sortField === 'title' ? 'active' : '' }}"
                                    wire:click="sortBy('title')">
                                    Policy Title

                                    <i
                                        class="table-sort-icon fa-solid {{ $sortField === 'title'
                                            ? ($sortDirection === 'asc'
                                                ? 'fa-arrow-up-short-wide'
                                                : 'fa-arrow-down-wide-short')
                                            : 'fa-arrow-down-up-across-line' }}"></i>
                                </button>
                            </th>

                            <th scope="col">Description</th>

                            <th scope="col">
                                Status
                            </th>

                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($systemPolicies as $policy)
                            <tr wire:key="policy-{{ $policy->id }}">
                                <td class="">
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $policy->title }}
                                </td>

                                <td class="text-muted small" style="max-width: 380px;">
                                    {!! Str::limit(strip_tags($policy->policy_statement), 90) !!}
                                </td>

                                <td>
                                    @if ($policy->is_active === true)
                                        <span class="badge bg-success text-white">
                                            <i class="fa-solid fa-circle-check me-1"></i>
                                            Active
                                        </span>
                                    @else
                                        <span class="badge bg-danger text-white">
                                            <i class="fa-solid fa-circle-xmark me-1"></i>
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="text-end">
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('admin.systemPolicies.show', ['slug' => $policy->slug]) }}"
                                            class="btn btn-sm btn-primary-b rounded" title="View policy">
                                            <i class="fa-solid fa-eye"></i> View
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Mobile cards --}}
        <div class="policy-mobile p-3">
            @foreach ($systemPolicies as $policy)
                <div class="policy-mobile-card" wire:key="mobile-policy-{{ $policy->id }}">
                    <a href="{{ route('admin.systemPolicies.show', ['slug' => $policy->slug]) }}" class="text-decoration-none">
                        <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <div class="text-bold mobile-card-title">
                                    {{ $policy->title }}
                                </div>
                            </div>

                            @if ($policy->is_active === true)
                                <span class="badge bg-success text-white">
                                    <i class="fa-solid fa-circle-check me-1"></i>
                                    Active
                                </span>
                            @else
                                <span class="badge bg-danger text-white">
                                    <i class="fa-solid fa-circle-xmark me-1"></i>
                                    Inactive
                                </span>
                            @endif
                        </div>

                        <p class="text-muted small mb-3">
                            {!! Str::limit(strip_tags($policy->policy_statement), 140) !!}
                        </p>

                        <div class="d-flex justify-content-end gap-2">
                            {{-- <a href="{{ route('admin.systemPolicies.show', ['slug' => $policy->slug]) }}"
                                class="btn btn-sm btn-primary-b rounded">
                                <i class="fa-solid fa-eye"></i>
                                View
                            </a> --}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    <div class="card-footer bg-white border-top py-3">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
            <small class="text-muted">
                Showing
                {{ $systemPolicies->firstItem() ?? 0 }} to
                {{ $systemPolicies->lastItem() ?? 0 }} of
                {{ $systemPolicies->total() }} results
            </small>

            <div>
                {{ $systemPolicies->links() }}
            </div>
        </div>
    </div>
</div>

<style>
    /* Responsive switch: mobile first */
    .policy-desktop {
        display: none !important;
    }

    .policy-mobile {
        display: block !important;
    }

    @media (min-width: 768px) {
        .policy-desktop {
            display: block !important;
        }

        .policy-mobile {
            display: none !important;
        }
    }

    /* Policy icon */
    .policy-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        flex-shrink: 0;
        border-radius: 50%;
        background: var(--bs-primary-bg-subtle);
        color: var(--bs-primary);
    }

    /* Mobile cards blend with page background */
    .policy-mobile-card {
        background: transparent;
        border: 0;
        border-bottom: 1px solid var(--bs-border-color);
        border-radius: 0;
        padding-bottom: 16px;
        margin-bottom: 30px;
    }

    .policy-mobile-card:last-child {
        border-bottom: 0;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    /* Table polish */
    .table th .btn-link {
        vertical-align: middle;
    }

    .table td {
        vertical-align: middle;
    }

    .table .btn-group {
        min-width: 86px;
    }

    .card .card-title {
        font-size: 25px;
    }

    /* Reusable data table */
    .data-table-head {
        background: var(--bs-tertiary-bg);
        border-bottom: 1px solid var(--bs-border-color);
    }

    .data-table-head th {
        padding: 12px 16px;
        font-size: 14px;
        font-weight: bold;
        letter-spacing: .04em;
        text-transform: uppercase;
        color: white;
        background: var(--primary-object-col);
        white-space: nowrap;
    }

    /* Sortable column button */
    .table-sort {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        /* padding: 0; */
        border: 0;
        background: transparent;
        color: inherit;
        font: inherit;
        font-weight: inherit;
        letter-spacing: inherit;
        text-transform: inherit;
        cursor: pointer;
        transition: color .15s ease;
    }

    .table-sort:hover,
    .table-sort:focus-visible {
        color: var(--bs-primary);
        outline: none;
    }

    .table-sort.active {
        color: white;
    }

    .table-sort-icon {
        /* font-size: 11px; */
        opacity: .45;
        transition: opacity .15s ease;
    }

    .table-sort:hover .table-sort-icon,
    .table-sort.active .table-sort-icon {
        opacity: 1;
    }

    /* Reusable record icon */
    .record-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        flex-shrink: 0;
        border-radius: 50%;
        background: var(--bs-primary-bg-subtle);
        color: var(--bs-primary);
    }

    /* Reusable mobile record card */
    .mobile-record {
        background: transparent;
        border: 0;
        border-bottom: 1px solid var(--bs-border-color);
        border-radius: 0;
        padding-bottom: 16px;
        margin-bottom: 25px;
    }

    .mobile-record:last-child {
        border-bottom: 0;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    /* Reusable responsive table switch */
    .table-desktop {
        display: none !important;
    }

    .table-mobile {
        display: block !important;
    }

    @media (min-width: 768px) {
        .table-desktop {
            display: block !important;
        }

        .table-mobile {
            display: none !important;
        }
    }

    /* Reusable row hover */
    .table-hover>tbody>tr:hover>* {
        --bs-table-accent-bg: var(--bs-primary-bg-subtle);
    }

    .policy-desktop .table th,
    .policy-desktop .table td {
        padding-left: 16px;
        padding-right: 16px;
    }

    .policy-desktop .table td:first-child,
    .policy-desktop .table th:first-child {
        padding-left: 20px;
    }

    .policy-desktop .table td:last-child,
    .policy-desktop .table th:last-child {
        padding-right: 20px;
    }

    .mobile-card-title {
        color: var(--primary-object-col) !important;
        font-weight: bold;
    }
</style>
