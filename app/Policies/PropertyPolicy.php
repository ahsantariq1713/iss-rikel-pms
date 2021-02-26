<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        return $user->isAdmin();
    }

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Property $property)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, Property $property)
    {
        //
    }

    public function delete(User $user, Property $property)
    {
        //
    }

    public function restore(User $user, Property $property)
    {
        //
    }

    public function forceDelete(User $user, Property $property)
    {
        //
    }
}
