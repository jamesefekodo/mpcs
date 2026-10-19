<?php

namespace App\Livewire\Tables;

use App\Models\Config\SystemPolicies\SystemPolicy;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SystemPolicyTable extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public string $search = '';

    #[Url(history: true)]
    public string $status = '';

    #[Url(history: true)]
    public string $sortField = 'title';

    #[Url(history: true)]
    public string $sortDirection = 'asc';

    public int $perPage = 20;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatus(): void
    {
        $this->resetPage();
    }

    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc'
                ? 'desc'
                : 'asc';

            return;
        }

        $this->sortField = $field;
        $this->sortDirection = 'asc';
    }

    public function resetFilters(): void
    {
        $this->reset(['search', 'status']);
        $this->resetPage();
    }

    public function render()
    {
        $systemPolicies = SystemPolicy::query()
            ->when($this->search !== '', function ($query) {
                $search = '%' . trim($this->search) . '%';

                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', $search)
                        ->orWhere('code', 'like', $search)
                        ->orWhere('description', 'like', $search);
                });
            })
            ->when($this->status !== '', function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('components.tables.system-policy-table', [
            'systemPolicies' => $systemPolicies,
        ]);

    }
}
