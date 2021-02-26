<?php

namespace App\Http\Livewire\Tenant;

use App\Helpers\Swal;
use App\Models\Tenant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TenantCreate extends Component
{
    use AuthorizesRequests;

    public $tenant, $projectId;
    public $idTypes = [], $relocationTypes = ['Permanent', 'Temporary'];

    protected $rules = [
        'tenant.name' => 'required',
        'tenant.citizenship' => 'nullable',
        'tenant.id_type' => 'required',
        'tenant.id_number' => 'required|unique:tenants,id_number',
        'tenant.relocation_type' => 'required',
        'tenant.income' => 'required|integer',
        'tenant.deposit' => 'required|integer',
        'tenant.rent' => 'required|integer',
        'tenant.total_occupants' => 'required|integer',
        'tenant.allotted_units' => 'required|integer',
        'tenant.allotted_bedroom_size' => 'nullable',
        'tenant.email' => 'nullable|email',
        'tenant.mobile_number' => 'nullable',
        'tenant.work_phone' => 'nullable',
        'tenant.address' => 'nullable',
        'tenant.city' => 'nullable',
        'tenant.state' => 'nullable',
        'tenant.country' => 'nullable',
        'tenant.zipcode' => 'nullable',
    ];

    protected $messages = [
        'tenant.id_number.unique' => 'A tenant already exists with this id number'
    ];

    public function mount($projectId)
    {
        $this->projectId = $projectId;
    }

    protected $listeners = ['createTenant' => 'create'];
    public function create()
    {
        $this->authorize('create', Tenant::class);
        $this->idTypes = Tenant::distinct('id_type')->pluck('id_type');
        $this->tenant = new Tenant();
        $this->emit('showTenantCreateForm');
    }

    public function store()
    {
        $this->authorize('create', Tenant::class);
        $this->validate();
        $this->tenant->project_id = $this->projectId;
        $this->tenant->save();

        $this->emit('tenantCreated', $this->tenant);
        Swal::alert($this, 'success', 'Tenant Added', 'Tenant added to the system', 'Ok', 1500, 'modal-tenant-create-dismiss');
    }

    public function render()
    {
        return view('livewire.tenant.tenant-create');
    }
}
