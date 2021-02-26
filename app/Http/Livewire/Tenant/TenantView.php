<?php

namespace App\Http\Livewire\Tenant;

use App\Models\Tenant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TenantView extends Component
{
    use AuthorizesRequests;

    public $tenant = null;

    protected $listeners = ['viewTenant' => 'view'];

    public function view($id)
    {
        $this->tenant = Tenant::findOrFail($id);
        $this->authorize('view', $this->tenant);
        $this->emit('showTenantViewForm');
    }

    public function render()
    {
        return view('livewire.tenant.tenant-view');
    }
}
