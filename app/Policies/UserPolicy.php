<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if( $user->isAdmin()){
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return $user->isSupervisor();
    }


    public function view(User $user, User $model)
    {
        return $user->isSupervisor();
    }


    public function create(User $user)
    {
        return $user->isSupervisor();
    }

    public function createSuper(User $user)
    {
        //
    }

    public function update(User $user, User $model)
    {
        return ($user->isSupervisor() && $model->role == 'Worker');
    }

    public function delete(User $user, User $model)
    {
        //
    }

    public function restore(User $user, User $model)
    {
        //
    }


    public function forceDelete(User $user, User $model)
    {
        //
    }
}
