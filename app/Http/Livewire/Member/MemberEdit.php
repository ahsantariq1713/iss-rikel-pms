<?php

namespace App\Http\Livewire\Member;

use App\Helpers\Swal;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class MemberEdit extends Component
{
    use AuthorizesRequests;

    public $user,$isBlocked;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
        'user.mobile_number' => 'nullable',
    ];



    private function uniqueRules()
    {
        return  [
            'user.name' => 'unique:users,name,' . $this->user->id,
            'user.email' => 'unique:users,email,' . $this->user->id
        ];
    }

    protected $messages = [
        'user.name.unique' => 'A user already exists with this name',
        'user.email.unique' => 'A user already exists with this email'
    ];

    protected $listeners = ['editMember' => 'edit'];

    public function edit($id)
    {
        $this->user = User::findOrFail($id);
        $this->authorize('update', $this->user);
        $this->isBlocked = $this->user->status == 'Blocked' ? 'Blocked' : null;
        $this->emit('showMemberEditForm');
    }

    public function update()
    {
        $this->authorize('update', User::class);
        $this->validate($this->uniqueRules());
        $this->validate();
        $this->user->status = $this->isBlocked == 'Blocked' ? 'Blocked' : 'Active';
        $this->user->update();
        $this->emit('memberUpdated', $this->user);
        Swal::alert($this, 'success', 'Changes Saved', 'Member has been saved successfully', 'Ok', 1500, 'modal-member-edit-dismiss');
    }

    public function render()
    {
        return view('livewire.member.member-edit');
    }
}
