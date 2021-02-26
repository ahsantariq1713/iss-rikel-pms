<?php

namespace App\Http\Livewire\Project;

use App\Helpers\Swal;
use App\Models\Budget;
use App\Models\Developer;
use App\Models\Project;
use App\Models\ProjectPhase;
use App\Models\Property;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ProjectCreate extends Component
{
    use AuthorizesRequests;

    public $project, $phases, $developers, $developer_id;

    protected $rules = [
        'project.name' => 'required|unique:projects,name',
        'project.moving_company' => 'required',
        'project.management_company' => 'required',
        'project.consultant' => 'required',
        'project.schedules_name' => 'required',
        'project.start_date' => 'required',
        'project.commencement' => 'required',
        'phases' => 'required',
        'developer_id' => 'required|string',
    ];

    protected $messages = [
        'project.name.unique' => 'A project already exists with this name'
    ];


    protected $listeners = ['createProject' => 'create'];
    public function create()
    {
        $this->authorize('create', Project::class);
        $this->project = new Project();
        $this->developers = Developer::select('id','name')->get()->toArray();
        $this->emit('showProjectCreateForm', 'property');
    }

    public function store()
    {
        $this->authorize('create', Project::class);
        $this->validate();
        $this->project->developer()->associate($this->developer_id);
        $this->project->save();

        //create phases for current project
        foreach ($this->phases as $phaseName) {
            $phase = new ProjectPhase();
            $phase->name = $phaseName;
            $phase->project()->associate($this->project);
            $phase->save();
        }

        Budget::create(['project_id' => $this->project->id]);

        $this->emit('projectCreated', $this->project);
        Swal::alert($this, 'success', 'Project Added', 'Project added to the system', 'Ok', 1500, 'modal-project-create-dismiss');
    }

    public function render()
    {
        return view('livewire.project.project-create');
    }
}
