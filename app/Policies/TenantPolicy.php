<?php

namespace App\Policies;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TenantPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if($user->isAdmin()|| $user->isSupervisor()){
            return true;
        }
    }

    public function import(User $user){
        return $user->isWorker();
    }

    public function viewAny(User $user)
    {
       return $user->isWorker();
    }

    public function view(User $user, Tenant $tenant)
    {
        return $tenant->project->team->contains($user);
    }

    public function create(User $user)
    {
        return $user->isWorker();
    }

    public function update(User $user, Tenant $tenant)
    {
        return $tenant->project->team->contains($user);
    }

    public function delete(User $user, Tenant $tenant)
    {
        return $tenant->project->team->contains($user);
    }

    public function restore(User $user, Tenant $tenant)
    {
        //
    }

    public function forceDelete(User $user, Tenant $tenant)
    {
        //
    }
}
