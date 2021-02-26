<?php

namespace App\Http\Livewire\Property;

use App\Helpers\Swal;
use App\Models\FundingSource;
use App\Models\Property;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class PropertyCreate extends Component
{
    use AuthorizesRequests;

    public $property, $fundSources = [];

    protected $rules = [
        'property.name' => 'required|unique:properties,name',
        'property.address' => 'nullable',
        'property.city' => 'required',
        'property.state' => 'nullable',
        'property.country' => 'nullable',
        'property.zipcode' => 'nullable',
        'property.build_date' => 'required',
        'property.demolition_date' => 'required',
        'property.funding_source' => 'required',
    ];

    protected $messages = [
        'property.name.unique' => 'A property already exists with this name'
    ];

    protected $listeners = ['createProperty' => 'create'];
    public function create()
    {
        $this->authorize('create', Property::class);
        $this->property = new Property();
        $this->fundSources = FundingSource::all()->pluck('name');
        $this->emit('showPropertyCreateForm');
    }

    public function store()
    {
        $this->authorize('create', Property::class);
        $this->validate();

        //get fund source array
        $fundSourceArray = $this->property->funding_source;

        //pass new fund source arraya and existing sources to the tryNewInsert method
        FundingSource::tryInsertNew($fundSourceArray, $this->fundSources);

        //set property funding_source a comma separated list of fundSourceArray
        $this->property->funding_source = implode(',', $fundSourceArray);

        $this->property->save();

        $this->emit('propertyCreated', $this->property);
        $this->property = new Property();

        Swal::alert($this, 'success', 'Property Added', 'Property added to the system', 'Ok', 1500, 'modal-property-create-dismiss');
    }

    public function render()
    {
        return view('livewire.property.property-create');
    }
}
