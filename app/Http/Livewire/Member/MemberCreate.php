<?php

namespace App\Http\Livewire\Member;

use App\Helpers\Swal;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class MemberCreate extends Component
{
    use AuthorizesRequests;

    public $user,$role;

    protected $rules = [
        'user.name' => 'required|unique:users,name',
        'user.email' => 'required|email|unique:users,email',
        'user.mobile_number' => 'nullable',
        'role' => 'required|integer|max:2|min:1'
    ];

    protected $messages = [
        'user.name.unique' => 'A user already exists with this name',
        'user.email.unique' => 'A user already exists with this email',
        'role' => 'Role can be worker or supervisor.'
    ];

    protected $listeners = ['createMember' => 'create'];
    public function create()
    {
        $this->authorize('create', User::class);
        $this->user = new User();
        $this->emit('showMemberCreateForm');
    }

    public function store()
    {
        $this->authorize('create', User::class);
        $this->validate();
        if(Auth::user()->isAdmin()){
            $this->user->role = $this->role == 2 ? 'Supervisor' : 'Worker';
        }
        else{
            $this->user->role = 'Worker';
        }
        $this->user->password = Hash::make('password');
        $this->user->save();
        $this->emit('userCreated', $this->user);
        Swal::alert($this, 'success', 'Member Added', 'Member added to the system', 'Ok', 1500, 'modal-member-create-dismiss');
    }
    public function render()
    {
        return view('livewire.member.member-create');
    }
}
