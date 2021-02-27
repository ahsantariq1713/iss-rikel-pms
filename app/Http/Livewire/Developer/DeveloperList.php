<?php

namespace App\Http\Livewire\Developer;

use App\Helpers\StringConvertor;
use App\Models\Developer;
use App\Traits\Searchable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;


class DeveloperList extends Component
{

    use Searchable, AuthorizesRequests;

    protected $listeners = ['developerCreated', 'developerUpdated'];

    public function developerCreated($developer){}
    public function developerUpdated($developer){}

    public function mount()
    {
        $this->authorize('viewAny', App\Models\Developer::class);
        $this->registerEntity(Developer::class);
        $this->entityName = 'Developer';
        $this->entityNamePlural = 'Developers';
        $this->entityIdentifier = 'developer';


        $this->setSearchBy(['Id', 'Name', 'Email', 'Mobile Number', 'City']);
        $this->setSortBy(['Id', 'Name', 'Created At']);


        $this->setColumns([
            ['key' => 'id',  'type' => 'text', 'header' => '#','display' => true],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name','display' => true],
            ['key' => 'email', 'type' => 'text', 'header' => 'Email','display' => true],
            ['key' => 'work_phone', 'type' => 'text', 'header' => 'Work Phone','display' => true],
            ['key' => 'mobile_number', 'type' => 'text', 'header' => 'Mobile Number','display' => true],
            ['key' => 'address', 'type' => 'text', 'header' => 'Address','display' => false],
            ['key' => 'city', 'type' => 'text', 'header' => 'City','display' => true],
            ['key' => 'state', 'type' => 'text', 'header' => 'State','display' => false],
            ['key' => 'country', 'type' => 'text', 'header' => 'Country','display' => false],
            ['key' => 'created_at', 'type' => 'date', 'header' => 'Created Date', 'display' => false, 'format' => 'd M, Y'],
            ['key' => 'updated_at', 'type' => 'date', 'header' => 'Updated Date', 'display' => false, 'format' => 'd M, Y'],
        ]);

        $this->setListColumns([
            ['key' => 'imageText', 'type' => 'imageText', 'header' => 'Image', 'display' => false],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name','display' => true],
            ['key' => 'email', 'type' => 'text', 'header' => 'Email','display' => true],
        ]);

        // $this->setDateRanges(['Updated Date Range' => 'updated_at', 'Created Date Range' => 'created_at' ]);

        //$this->setListViewDefault();

        $this->initSearch([['key' => 'param' , 'value' => 'Name']]);

    }

    public function edit($id){
        $this->emit('editDeveloper', $id);
    }

    public function updated($property){
        $this->updatedSearch($property);
    }

    public function render()
    {
        $entities = $this->getData();
        return view('livewire.developer.developer-list', compact('entities'));
    }
}
