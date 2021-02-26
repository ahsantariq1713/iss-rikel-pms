<?php

namespace App\Http\Livewire\Project;

use App\Helpers\Swal;
use App\Models\ProjectPhase;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CompletePhase extends Component
{

    use AuthorizesRequests;

    public $phase;

    protected $rules = [
        'phase.description' => 'required',
    ];


    protected $listeners = ['completePhase' => 'edit'];
    public function edit($id)
    {
        $this->phase = ProjectPhase::findOrFail($id);
        $this->authorize('update', $this->phase);
        $this->emit('showPhaseCompleteForm');
    }


    public function update()
    {
        $this->authorize('update', ProjectPhase::class);
        $this->validate();
        $this->phase->completed_at = now();
        $this->phase->save();
        $this->phase->project->processStatus();
        $this->emit('phaseUpdated', $this->phase);
        Swal::alert($this, 'success', 'Changes Saved', 'Property has been saved successfully', 'Ok', 1500, 'modal-phase-complete-dismiss');
    }

    public function render()
    {
        return view('livewire.project.complete-phase');
    }
}
