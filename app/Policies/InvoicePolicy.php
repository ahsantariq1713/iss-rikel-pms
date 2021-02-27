<?php

namespace App\Policies;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if($user->isAdmin() || $user->isSupervisor()){
            return true;
        }
    }

    public function markPaid(User $user, Invoice $invoice)
    {
        //
    }

    public function viewAny(User $user)
    {
        return $user->isWorker();
    }

    public function view(User $user, Invoice $invoice)
    {
        return $invoice->project->team->contains($user);
    }

    public function send(User $user, Invoice $invoice)
    {
       //
    }

    public function create(User $user)
    {
        return $user->isWorker();
    }

    public function update(User $user, Invoice $invoice)
    {
        return $invoice->project->team->contains($user);
    }

    public function delete(User $user, Invoice $invoice)
    {
        //
    }

    public function restore(User $user, Invoice $invoice)
    {
        //
    }

    public function forceDelete(User $user, Invoice $invoice)
    {
        //
    }
}
