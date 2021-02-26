<?php

namespace App\Http\Livewire\Developer;

use App\Helpers\Swal;
use App\Models\Developer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class DeveloperCreate extends Component
{
    use AuthorizesRequests;

    public $developer;

    protected $rules = [
        'developer.name' => 'required|unique:developers,name',
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

    protected $messages = [
        'developer.name.unique' => 'A developer already exists with this name'
    ];

    protected $listeners = ['createDeveloper' => 'create'];
    public function create()
    {
        $this->authorize('create', Developer::class);
        $this->developer = new Developer();
        $this->emit('showDeveloperCreateForm');
    }

    public function store()
    {
        $this->authorize('create', Developer::class);
        $this->validate();
        $this->developer->save();
        $this->emit('developerCreated', $this->developer);
        Swal::alert($this, 'success', 'Developer Added', 'Developer added to the system', 'Ok', 1500, 'modal-developer-create-dismiss');
    }

    public function render()
    {
        return view('livewire.developer.developer-create');
    }
}
