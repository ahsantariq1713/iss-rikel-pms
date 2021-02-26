<?php

namespace App\Http\Livewire\Tenant;

use App\Helpers\Swal;
use App\Models\Tenant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class TenantEdit extends Component
{

    use AuthorizesRequests;

    public $tenant = null;
    public $idTypes = [], $relocationTypes = ['Permanent', 'Temporary'];

    protected $rules = [
        'tenant.name' => 'required',
        'tenant.citizenship' => 'nullable',
        'tenant.id_type' => 'required',
        'tenant.id_number' => 'required',
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

    private function uniqueRules()
    {
        return  ['tenant.id_number' => 'unique:tenants,id_number,' . $this->tenant->id];
    }

    protected $listeners = ['editTenant' => 'edit'];

    public function edit($id)
    {
        $this->tenant = Tenant::findOrFail($id);
        $this->authorize('update', $this->tenant);
        $this->emit('showTenantEditForm');
    }

    public function update()
    {
        $this->authorize('update', $this->tenant);
        $this->validate($this->uniqueRules());
        $this->validate();
        $this->tenant->update();
        $this->emit('tenantUpdated', $this->tenant);
        $this->emit('closeTenantEditForm');
        Swal::alert($this, 'success', 'Changes Saved', 'Tenant has been saved successfully', 'Ok', 1500);
    }

    public function render()
    {
        return view('livewire.tenant.tenant-edit');
    }
}
