<?php

namespace App\Http\Livewire\Property;

use App\Models\Property;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class PropertyView extends Component
{
    use AuthorizesRequests;

    public $property = null;

    protected $listeners = ['viewProperty' => 'view'];

    public function view($id)
    {
        $this->property = Property::findOrFail($id);
        $this->authorize('view', $this->property);
        $this->emit('showPropertyViewForm');
    }

    public function render()
    {
        return view('livewire.property.property-view');
    }
}
