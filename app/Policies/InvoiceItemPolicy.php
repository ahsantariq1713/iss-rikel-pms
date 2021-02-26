<?php

namespace App\Policies;

use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoiceItemPolicy
{
    use HandlesAuthorization;


    public function before(User $user){
        return $user->isAdmin();
    }


    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return mixed
     */
    public function view(User $user, InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return mixed
     */
    public function update(User $user, InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return mixed
     */
    public function delete(User $user, InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return mixed
     */
    public function restore(User $user, InvoiceItem $invoiceItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\InvoiceItem  $invoiceItem
     * @return mixed
     */
    public function forceDelete(User $user, InvoiceItem $invoiceItem)
    {
        //
    }
}
