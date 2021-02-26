<?php

namespace App\Http\Livewire\Project;

use App\Helpers\Swal;
use App\Models\Project;
use App\Models\Property;
use App\Models\PropertyFeature;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class AttachProperty extends Component
{

    use AuthorizesRequests;
    public $project, $properties = [], $property_id;
    public $propertyFeature;

    protected $rules = [
        'property_id' => 'required',
        'propertyFeature.bedroom_size' => 'nullable',
        'propertyFeature.units' => 'required|integer',
        'propertyFeature.reserved_units' => 'required|integer',
        'propertyFeature.vacant_units' => 'integer',
        'propertyFeature.renovation_date' => 'required|date',
    ];

    protected $listeners = [
        'attachProperty' => 'attach'
    ];

    public function attach($id)
    {
        $this->project = Project::findOrFail($id);
        $this->authorize('update', $this->project);
        $this->properties = Property::select('id','name')->get()->toArray();
        $this->propertyFeature = $this->project->propertyFeature ?? new PropertyFeature();
        $this->property_id = $this->project->property ? $this->project->property->id : null;
        $this->emit('showAttachPropertyForm');
    }

    public function store()
    {
        $this->authorize('update', $this->project);
        $this->validate();
        $this->propertyFeature->project()->associate($this->project);
        $this->propertyFeature->save();
        $this->project->property()->associate($this->property_id);
        $this->project->save();
        $this->emit('propertyAttached', Property::find($this->property_id));
        Swal::alert($this, 'success', 'Property Attached', 'Property acched to the project', 'Ok', 1500, 'modal-attach-property-dismiss');
    }

    public function render()
    {
        return view('livewire.project.attach-property');
    }
}
