<?php

namespace App\Http\Livewire\Project;

use App\Models\Activity;
use Livewire\Component;

class ProjectActivities extends Component
{

    public $projectId;

    public function mount($projectId){
        $this->projectId = $projectId;
    }

    public function render()
    {
        $activities = Activity::where('entity_id', $this->projectId)->orderBy('created_at', 'desc')->get();

        return view('livewire.project.project-activities', compact('activities'));
    }
}
