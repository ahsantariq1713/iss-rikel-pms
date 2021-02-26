<?php

namespace App\Http\Livewire\Developer;

use App\Helpers\Swal;
use App\Models\Developer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class DeveloperEdit extends Component
{

    use AuthorizesRequests;

    public $developer = null;

    protected $rules = [
        'developer.name' => 'required',
        'developer.email' => 'required|email',
        'developer.work_phone' => 'nullable',
        'developer.mobile_number' => 'nullable',
        'developer.website_url' => 'nullable',
        'developer.address' => 'nullable',
        'developer.city' => 'nullable',
        'developer.state' => 'nullable',
        'developer.country' => 'nullable',
        'developer.additional_info' => 'nullable'
    ];

    private function uniqueRules()
    {
        return  ['developer.name' => 'required|unique:developers,name,' . $this->developer->id];
    }

    protected $messages = [
        'developer.name.unique' => 'A developer already exists with this name'
    ];

    protected $listeners = ['editDeveloper' => 'edit'];

    public function edit($id)
    {
        $this->developer = Developer::findOrFail($id);
        $this->authorize('update', $this->developer);
        $this->emit('showDeveloperEditForm');
    }

    public function update()
    {
        $this->authorize('update', Developer::class);
        $this->validate($this->uniqueRules());
        $this->validate();
        $this->developer->update();
        $this->emit('developerUpdated', $this->developer);
        Swal::alert($this, 'success', 'Changes Saved', 'Developer has been saved successfully', 'Ok', 1500,'modal-developer-edit-dismiss');
    }

    public function render()
    {
        return view('livewire.developer.developer-edit');
    }
}
