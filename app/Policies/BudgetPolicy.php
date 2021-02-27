<?php

namespace App\Policies;

use App\Models\Budget;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BudgetPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if($user->isAdmin() || $user->isSupervisor()){
            return true;
        }
    }

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Budget $budget)
    {
        return $budget->project->team->contains($user);
    }


    public function send(User $user, Budget $budget)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, Budget $budget)
    {
        //
    }


    public function delete(User $user, Budget $budget)
    {
        //
    }


    public function restore(User $user, Budget $budget)
    {
        //
    }

    public function forceDelete(User $user, Budget $budget)
    {
        //
    }
}
