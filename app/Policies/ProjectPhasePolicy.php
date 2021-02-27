<?php

namespace App\Policies;

use App\Models\ProjectPhase;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPhasePolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin() || $user->isSupervisor()) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, ProjectPhase $projectPhase)
    {
        //
    }


    public function create(User $user)
    {
        //
    }


    public function update(User $user, ProjectPhase $projectPhase)
    {
        return $projectPhase->project->team->contains($user);
    }

    public function delete(User $user, ProjectPhase $projectPhase)
    {
        //
    }


    public function restore(User $user, ProjectPhase $projectPhase)
    {
        //
    }


    public function forceDelete(User $user, ProjectPhase $projectPhase)
    {
        //
    }
}
