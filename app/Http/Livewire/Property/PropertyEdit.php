<?php

namespace App\Http\Livewire\Property;

use App\Helpers\Swal;
use App\Models\FundingSource;
use App\Models\Property;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class PropertyEdit extends Component
{
    use AuthorizesRequests;

    public $property, $fundSources = [];

    protected $rules = [
        'property.name' => 'required',
        'property.address' => 'nullable',
        'property.city' => 'required',
        'property.state' => 'nullable',
        'property.country' => 'nullable',
        'property.zipcode' => 'nullable',
        'property.build_date' => 'required',
        'property.demolition_date' => 'required',
        'property.funding_source' => 'required'
    ];


    private function uniqueRules()
    {
        return  ['property.name' => 'required|unique:properties,name,' . $this->property->id];
    }

    protected $messages = [
        'property.name.unique' => 'A property already exists with this name'
    ];

    protected $listeners = ['editProperty' => 'edit'];

    public function edit($id)
    {
        $this->property = Property::findOrFail($id);
        $this->authorize('update', $this->property);
        $this->fundSources = FundingSource::all()->pluck('name');
        $this->emit('showPropertyEditForm');
    }


    public function update()
    {
        $this->authorize('update', Property::class);
        $this->validate($this->uniqueRules());
        $this->validate();

        //get fund source array
        $fundSourceArray = $this->property->funding_source;
        if (!is_array($fundSourceArray)) {
            $fundSourceArray = explode(',', $fundSourceArray);
        }

        //pass new fund source arraya and existing sources to the tryNewInsert method
        FundingSource::tryInsertNew($fundSourceArray, $this->fundSources);

        //set property funding_source a comma separated list of fundSourceArray
        $this->property->funding_source = implode(',', $fundSourceArray);

        $this->property->update();

        $this->emit('propertyUpdated', $this->property);

        Swal::alert($this, 'success', 'Changes Saved', 'Property has been saved successfully', 'Ok', 1500, 'modal-property-edit-dismiss');
    }

    public function render()
    {
        return view('livewire.property.property-edit');
    }
}
