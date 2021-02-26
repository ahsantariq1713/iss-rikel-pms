<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function mount(){
        $this->emit('navigated', 'home');
    }

    public function render()
    {
        return view('livewire.home');
    }
}
