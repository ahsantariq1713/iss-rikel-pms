<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class ProjectView extends Component
{
    public $project, $projectId;

    protected $listeners = ['developerUpdated', 'projectUpdated', 'developerChanged', 'propertyAttached', 'propertyUpdated', 'phaseUpdated'];

    public function developerUpdated($developer){}
    public function projectUpdated($project){}
    public function developerChanged($project){}
    public function propertyAttached($property){}
    public function propertyUpdated($property){}
    public function phaseUpdated($phase){}

    public function mount(Project $project){
        $this->project = $project;
        $this->projectId = $project->id;
    }

    public function render()
    {
        return view('livewire.project.project-view');
    }
}
