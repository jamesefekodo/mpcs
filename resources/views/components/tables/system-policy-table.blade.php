<div class="card">
    <div class="card-head">
        <div>
            <h2 class="card-title">System Policies</h2>
            <p class="card-sub">
                {{ $systemPolicies->total() }} polic{{ $systemPolicies->total() === 1 ? 'y' : 'ies' }} found
            </p>
        </div>

        <div class="table-actions">
            <div class="table-search">
                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                    type="search"
                    placeholder="Search policies..."
                    wire:model.live.debounce.400ms="search"
                >
            </div>

            <select
                class="table-filter"
                wire:model.live.debounce.300ms="status"
            >
                <option value="">All Statuses</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="draft">Draft</option>
                <option value="archived">Archived</option>
            </select>

            <button
                type="button"
                class="btn"
                wire:click="resetFilters"
            >
                <i class="fa-solid fa-rotate-left"></i>
                Reset
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>
                        <button
                            type="button"
                            class="sort-button"
                            wire:click="sortBy('title')"
                        >
                            Policy Title

                            @if ($sortField === 'title')
                                <i class="fa-solid fa-{{ $sortDirection === 'asc' ? 'arrow-up' : 'arrow-down' }}"></i>
                            @endif
                        </button>
                    </th>

                    <th>
                        <button
                            type="button"
                            class="sort-button"
                            wire:click="sortBy('code')"
                        >
                            Code

                            @if ($sortField === 'code')
                                <i class="fa-solid fa-{{ $sortDirection === 'asc' ? 'arrow-up' : 'arrow-down' }}"></i>
                            @endif
                        </button>
                    </th>

                    <th>Description</th>

                    <th>
                        <button
                            type="button"
                            class="sort-button"
                            wire:click="sortBy('status')"
                        >
                            Status

                            @if ($sortField === 'status')
                                <i class="fa-solid fa-{{ $sortDirection === 'asc' ? 'arrow-up' : 'arrow-down' }}"></i>
                            @endif
                        </button>
                    </th>

                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($systemPolicies as $policy)
                    <tr wire:key="policy-{{ $policy->id }}">
                        <td>
                            <div class="record-title">
                                <i class="fa-solid fa-file-shield"></i>
                                {{ $policy->title }}
                            </div>
                        </td>

                        <td>
                            <span class="record-code">{{ $policy->code }}</span>
                        </td>

                        <td class="record-description">
                            {{ Str::limit($policy->description, 90) }}
                        </td>

                        <td>
                            <span class="status {{ $policy->status === 'active' ? 'success' : 'warning' }}">
                                <i class="fa-solid fa-circle-{{ $policy->status === 'active' ? 'check' : 'clock' }}"></i>
                                {{ ucfirst($policy->status) }}
                            </span>
                        </td>

                        <td class="text-end">
                            <div class="actions">
                                <a
                                    {{-- href="{{ route('admin.system-policies.show', $policy) }}" --}}
                                    class="mini-btn"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                    View
                                </a>

                                @can('policy.update')
                                    <a
                                        {{-- href="{{ route('admin.system-policies.edit', $policy) }}" --}}
                                        class="mini-btn"
                                    >
                                        <i class="fa-solid fa-pen"></i>
                                        Edit
                                    </a>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">
                                <i class="fa-solid fa-folder-open"></i>
                                <p>No system policies match your search.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="table-footer">
        <div>
            Showing
            {{ $systemPolicies->firstItem() ?? 0 }} to
            {{ $systemPolicies->lastItem() ?? 0 }} of
            {{ $systemPolicies->total() }} results
        </div>

        <div>
            {{ $systemPolicies->links() }}
        </div>
    </div>
</div>
