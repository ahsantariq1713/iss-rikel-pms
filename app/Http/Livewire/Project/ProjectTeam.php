<?php

namespace App\Http\Livewire\Project;

use App\Models\User;
use Livewire\Component;

class ProjectTeam extends Component
{


    public $project, $teamIds;

    public function mount($project){
        $this->project = $project;
    }


    public function toggle($id){
        $user = User::find($id);
        if($this->project->team->contains($user)){
            $this->project->team()->detach($user);
        }else{
            $this->project->team()->attach($user);
        }
        $this->project->save();
    }

    public function render()
    {
        $team = $this->project->team->pluck('id')->toArray();
        $users = User::where('role', '!=' , 'Administrator')->get();
        return view('livewire.project.project-team', compact('users', 'team'));
    }
}
