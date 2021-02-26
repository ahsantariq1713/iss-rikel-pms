<?php

namespace App\Http\Livewire\Developer;

use App\Models\Developer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class DeveloperView extends Component
{
    use AuthorizesRequests;

    public $developer = null;

    protected $listeners = ['viewDeveloper' => 'view'];

    public function view($id)
    {
        $this->developer = Developer::findOrFail($id);
        $this->authorize('view', $this->developer);
        $this->emit('showDeveloperViewForm');
    }

    public function render()
    {
        return view('livewire.developer.developer-view');
    }
}
