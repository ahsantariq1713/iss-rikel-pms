<?php

namespace App\Http\Livewire\Tenant;

use App\Models\Tenant;
use App\Traits\Searchable;

use Livewire\Component;

class TenantList extends Component
{
    use  Searchable;

    protected $listeners = ['tenantCreated', 'tenantUpdated', 'tenantsImported'];

    public function tenantCreated($tenant)
    {
        $this->lastUpdated = now();
    }

    public function tenantUpdated($tenant)
    {
        $this->lastUpdated = now();
    }

    public function tenantsImported()
    {
        $this->lastUpdated = now();
    }

    public $projectId, $lastUpdated;

    public function mount($projectId)
    {
        $this->projectId = $projectId;

        $this->registerEntity(Tenant::class);
        $this->entityName = 'Tenant';
        $this->entityNamePlural = 'Tenants';
        $this->entityIdentifier = 'tenant';

        $this->setSearchBy(['Id', 'Name', 'Email', 'Citizenship', 'Id Type']);
        $this->setSortBy(['Id', 'Name', 'Citizenship', 'Id Type', 'Id Number', 'Created At', 'Updated At']);

        $this->setColumns([
            ['key' => 'id',  'type' => 'text', 'header' => '#', 'display' => true],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name', 'display' => true],
            ['key' => 'citizenship', 'type' => 'text', 'header' => 'Citizenship', 'display' => false],
            ['key' => 'id_type', 'type' => 'text', 'header' => 'Id Type', 'display' => false],
            ['key' => 'id_number', 'type' => 'text', 'header' => 'Id Number', 'display' => true],
            ['key' => 'rent', 'type' => 'text', 'header' => 'Rent', 'display' => true],
            ['key' => 'total_occupants', 'type' => 'text', 'header' => 'Total Occuppants', 'display' => true],
            ['key' => 'allotted_units', 'type' => 'text', 'header' => 'Allotted Units', 'display' => true],
            ['key' => 'allotted_bedroom_size', 'type' => 'text', 'header' => 'Bedroom Size', 'display' => true],

            [
                'key' => 'relocation_type', 'type' => 'badge', 'header' => 'Relocation', 'display' => true,
                'scheme' => [
                    ['mode' => 'Permanent', 'color' => 'purple'],
                    ['mode' => 'Temporary', 'color' => 'primary']
                ]
            ],
            ['key' => 'income',  'type' => 'text', 'header' => 'Income', 'display' => false],
            ['key' => 'deposit',  'type' => 'text', 'header' => 'Deposit', 'display' => false],

            ['key' => 'email',  'type' => 'text', 'header' => 'Email', 'display' => false],
            ['key' => 'mobile_number',  'type' => 'text', 'header' => 'Mobile Number', 'display' => false],
            ['key' => 'work_phone',  'type' => 'text', 'header' => 'Work Phone', 'display' => false],

            ['key' => 'address', 'type' => 'text', 'header' => 'Address','display' => false],
            ['key' => 'city', 'type' => 'text', 'header' => 'City','display' => false],
            ['key' => 'state', 'type' => 'text', 'header' => 'State','display' => false],
            ['key' => 'country', 'type' => 'text', 'header' => 'Country','display' => false],
            ['key' => 'zipcode', 'type' => 'text', 'header' => 'Zip','display' => false],

            ['key' => 'created_at', 'type' => 'date', 'header' => 'Created Date', 'display' => false, 'format' => 'd M, Y'],
            ['key' => 'updated_at', 'type' => 'date', 'header' => 'Updated Date', 'display' => false, 'format' => 'd M, Y'],
        ]);

        $this->setListColumns([
            ['key' => 'imageText', 'type' => 'imageText', 'header' => 'Image', 'display' => true],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name','display' => true],
            ['key' => 'email', 'type' => 'text', 'header' => 'Email','display' => true],
        ]);

        $this->setStateFilters([
            'relocation_type' =>
            [
                'display' => 'Relocation', 'scheme' => [
                    ['mode' => 'Permanent', 'color' => 'purple'],
                    ['mode' => 'Temporary', 'color' => 'primary']
                ]
            ],
        ]);

        $this->setImportAllowed();

        $this->setWhereRelationList([
            ['project_id' ,$this->projectId]
        ]);

        $this->initSearch([['key' => 'param', 'value' => 'Name']]);
    }

    public function edit($id)
    {
        $this->emit('editProject', $id);
    }

    public function updated($property)
    {
        $this->updatedSearch($property);
    }

    public function render()
    {
        $entities = $this->getData();
        return view('livewire.tenant.tenant-list', compact('entities'));
    }
}
