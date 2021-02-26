<?php

namespace App\Http\Livewire\Project;

use App\Helpers\Swal;
use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ProjectEdit extends Component
{
    use AuthorizesRequests;

    public $project = null;

    protected $rules = [
        'project.name' => 'required',
        'project.moving_company' => 'required',
        'project.management_company' => 'required',
        'project.consultant' => 'required',
        'project.schedules_name' => 'required',
        'project.start_date' => 'required',
        'project.commencement' => 'required',
    ];

    protected $messages = [
        'project.name.unique' => 'A project already exists with this name'
    ];

    private function uniqueRules()
    {
        return  ['project.name' => 'unique:projects,name,' . $this->project->id];
    }

    protected $listeners = ['editProject' => 'edit'];

    public function edit($id)
    {
        $this->project = Project::findOrFail($id);
        $this->authorize('update', $this->project);
        $this->emit('showProjectEditForm', 'project');
    }

    public function update()
    {
        $this->authorize('update', $this->project);
        $this->validate($this->uniqueRules());
        $this->validate();
        $this->project->update();
        $this->emit('projectUpdated', $this->project);
        $this->emit('closeProjectEditForm', 'project');
        Swal::alert($this, 'success', 'Changes Saved', 'Project has been saved successfully', 'Ok', 1500);
    }

    public function render()
    {
        return view('livewire.project.project-edit');
    }
}
