<?php

namespace App\Policies;

use App\Models\PropertyFeature;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyFeaturePolicy
{
    use HandlesAuthorization;


    public function before(User $user){
        return $user->isAdmin();
    }

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, PropertyFeature $propertyFeature)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, PropertyFeature $propertyFeature)
    {
        //
    }


    public function delete(User $user, PropertyFeature $propertyFeature)
    {
        //
    }


    public function restore(User $user, PropertyFeature $propertyFeature)
    {
        //
    }


    public function forceDelete(User $user, PropertyFeature $propertyFeature)
    {
        //
    }
}
