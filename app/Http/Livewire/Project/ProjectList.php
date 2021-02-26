<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use App\Traits\Searchable;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectList extends Component
{
    use Searchable;

    protected $listeners = ['projectCreated', 'projectUpdated'];

    public function projectCreated($project)
    {
    }
    public function projectUpdated($project)
    {
    }

    public function mount()
    {
        $this->registerEntity(Project::class);
        $this->entityName = 'Project';
        $this->entityNamePlural = 'Projects';
        $this->entityIdentifier = 'project';

        $this->setSearchBy(['Id', 'Name', 'Consultant', 'Moving Company', 'Management Company']);
        $this->setSortBy(['Id', 'Name', 'City', 'State', 'Bedroom Size', 'Units', 'Created At', 'Updated At']);

        $this->setColumns([
            ['key' => 'id',  'type' => 'text', 'header' => '#', 'display' => true],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name', 'display' => true],
            ['key' => 'developer_name', 'type' => 'text', 'header' => 'Developer', 'display' => true],
            ['key' => 'consultant', 'type' => 'text', 'header' => 'Consultant', 'display' => true],
            ['key' => 'moving_company', 'type' => 'text', 'header' => 'Moving Company', 'display' => false],
            ['key' => 'management_company', 'type' => 'text', 'header' => 'Management Company', 'display' => false],
            ['key' => 'start_date', 'type' => 'date', 'header' => 'Start Date', 'display' => true, 'format' => 'd M, Y'],
            ['key' => 'current_phase_name', 'type' => 'text', 'header' => 'Current Phase', 'display' => true],
            [
                'key' => 'status', 'type' => 'badge', 'header' => 'Status', 'display' => true,
                'scheme' => [
                    ['mode' => 'Processing', 'color' => 'primary'],
                    ['mode' => 'Completed', 'color' => 'success']
                ]
            ],
            ['key' => 'schedules_name', 'type' => 'text', 'header' => 'Schedules Name', 'display' => false],
            ['key' => 'created_at', 'type' => 'date', 'header' => 'Created Date', 'display' => false, 'format' => 'd M, Y'],
            ['key' => 'updated_at', 'type' => 'date', 'header' => 'Updated Date', 'display' => false, 'format' => 'd M, Y'],
        ]);

        $this->setListColumns([
            ['key' => 'imageText', 'type' => 'imageText', 'header' => 'Image', 'display' => false],
            ['key' => 'name', 'type' => 'text', 'header' => 'Name','display' => true],
            ['key' => 'status', 'type' => 'text', 'header' => 'Status','display' => true],
        ]);

        $this->setDateRanges(['Start Date Range' => 'start_date']);

        $this->setStateFilters([
            'status' =>
            [
                'display' => 'Status', 'scheme' => [
                    ['mode' => 'Processing', 'color' => 'primary'],
                    ['mode' => 'Completed', 'color' => 'success'],
                ]
            ]
        ]);

        $this->setViewModelRedirect();

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
        $query = $this->getQuery();
        $query->whereHas('team', function($team){
            return $team->where('user_id' ,Auth::id());
        });
        $entities = $this->makePagination($query);
        return view('livewire.project.project-list', compact('entities'));
    }
}
