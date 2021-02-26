<?php

namespace App\Http\Livewire\Project;

use App\Helpers\Swal;
use App\Models\Developer;
use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class AttachDeveloper extends Component
{
    use AuthorizesRequests;

    public $project, $developers = [], $developer_id;

    protected $rules = [
        'developer_id' => 'required',
    ];


    protected $listeners = ['attachDeveloper' => 'attach'];
    public function attach($id)
    {
        $this->project = Project::findOrFail($id);
        $this->developer_id = $this->project->developer->id;
        $this->developers = Developer::select('id','name')->get()->toArray();
        $this->authorize('update', $this->project);
        $this->emit('showAttachDeveloperForm');
    }

    public function update()
    {
        $this->authorize('update', Project::class);
        $this->validate();
        $this->project->developer()->associate($this->developer_id);
        $this->project->save();
        $this->emit('developerChanged', $this->project);
        Swal::alert($this, 'success', 'Developer Changed', 'Developer has been attachd for project', 'Ok', 1500, 'modal-developer-attach-dismiss');
    }

    public function render()
    {
        return view('livewire.project.attach-developer');
    }
}
