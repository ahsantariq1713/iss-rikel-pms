<?php

namespace App\Http\Livewire\Member;

use App\Models\User;
use App\Traits\Searchable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MemberList extends Component
{
    use Searchable;

    protected $listeners = ['memberCreated', 'memberUpdated'];

    public function memberCreated($user){}
    public function memberUpdated($user){}

    public function mount()
    {
        $this->registerEntity(User::class);
        $this->entityName = 'Member';
        $this->entityNamePlural = 'Relocation Team';
        $this->entityIdentifier = 'member';


        $this->setSearchBy(['Id', 'Name', 'Email', 'Mobile Number']);
        $this->setSortBy(['Id', 'Name', 'Created At']);


        $this->setColumns([
            ['key' => 'id',  'type' => 'text', 'header' => '#','display' => true],
            ['key' => 'imageText', 'type' => 'imageText', 'header' => 'Image', 'display' => true],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name','display' => true],
            ['key' => 'email', 'type' => 'text', 'header' => 'Email','display' => true],
            ['key' => 'mobile_number', 'type' => 'text', 'header' => 'Mobile Number','display' => true],
            [
                'key' => 'status', 'type' => 'badge', 'header' => 'Status', 'display' => true,
                'scheme' => [
                    ['mode' => 'Active', 'color' => 'success'],
                    ['mode' => 'Blocked', 'color' => 'danger']
                ]
            ],
            ['key' => 'created_at', 'type' => 'date', 'header' => 'Created Date', 'display' => false, 'format' => 'd M, Y'],
            ['key' => 'updated_at', 'type' => 'date', 'header' => 'Updated Date', 'display' => false, 'format' => 'd M, Y'],
        ]);

        $this->setListColumns([
            ['key' => 'imageText', 'type' => 'imageText', 'header' => 'Image', 'display' => false],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name','display' => true],
            ['key' => 'email', 'type' => 'text', 'header' => 'Email','display' => true],
        ]);

        $this->setStateFilters([
            'status' =>
            [
                'display' => 'Status', 'scheme' => [
                    ['mode' => 'Active', 'color' => 'success'],
                    ['mode' => 'Blocked', 'color' => 'danger']
                ]
            ]
        ]);

        // $this->setDateRanges(['Updated Date Range' => 'updated_at', 'Created Date Range' => 'created_at' ]);

        //$this->setListViewDefault();

        $this->setWhereRelationList([
            ['id' , '!=' , Auth::id()]
        ]);
        $this->initSearch([['key' => 'param' , 'value' => 'Name']]);

    }

    public function edit($id){
        $this->emit('editMember', $id);
    }

    public function updated($property){
        $this->updatedSearch($property);
    }

    public function render()
    {
        $entities = $this->getData();
        return view('livewire.member.member-list', compact('entities'));
    }
}
