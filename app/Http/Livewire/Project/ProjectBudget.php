<?php

namespace App\Http\Livewire\Project;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ProjectBudget extends Component
{

    use AuthorizesRequests;

    public $budget;

    public function mount($budget)
    {
        $this->authorize('view', $budget);
        $this->budget = $budget;
    }

    protected $rules = [
        'budget.pr_utility' => 'required|integer',
        'budget.pr_comparable_rent' => 'required|integer',
        'budget.pr_moving_expense' => 'required|integer',
        'budget.tr_offsite' => 'required|integer',
        'budget.tr_utility' => 'required|integer',
        'budget.tr_comparable_rent' => 'required|integer',
        'budget.tr_off_moving_expense' => 'required|integer',
        'budget.tr_on_moving_expense' => 'required|integer',
        'budget.pr_consultancy' => 'required|integer',
        'budget.tr_consultancy_off' => 'required|integer',
        'budget.tr_consultancy_on' => 'required|integer',
    ];

    protected $messages = ['budget.tr_offsite.max' => 'Cannot be greater than total temporary residents'];

    protected $listeners = ['tenantCreated', 'tenantUpdated'];

    public function tenantCreated($tenant){
        $this->budget->refresh();
    }

    public function tenantUpdated($tenant){
        $this->budget->refresh();
    }

    public function updated($property)
    {
        $this->validateOnly($property);
        if($property == 'budget.tr_offsite'){

            $this->validate(['budget.tr_offsite' => 'integer|max:' . $this->budget->trResidents]);
        }
        $this->authorize('update', $this->budget);
        $this->budget->save();
    }

    public function render()
    {
        return view('livewire.project.project-budget');
    }
}
