<?php

namespace App\Http\Livewire\Project;

use App\Helpers\ActivityLogger;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProjectTeam extends Component
{

    use AuthorizesRequests;

    public $project, $teamIds;

    public function mount($project){
        $this->authorize('assign', $project);
        $this->project = $project;
    }

    public function toggle($id){
        $this->authorize('assign', $this->project);
        $user = User::find($id);
        if($this->project->team->contains($user)){
            $this->project->team()->detach($user);
            ActivityLogger::detached(Auth::user(),$this->project,$user,'Unassigned');
        }else{
            $this->project->team()->attach($user);
            ActivityLogger::attached(Auth::user(),$this->project,$user,'Assigned');
        }
        $this->project->save();
    }

    public function render()
    {
        $team = $this->project->team->pluck('id')->toArray();
        $users = User::where('role', 'Worker')->get();
        return view('livewire.project.project-team', compact('users', 'team'));
    }
}
