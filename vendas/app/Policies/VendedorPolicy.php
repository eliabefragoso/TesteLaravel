<?php

namespace App\Policies;

use App\User;
use App\vendedor;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendedorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the vendedor.
     *
     * @param  \App\User  $user
     * @param  \App\vendedor  $vendedor
     * @return mixed
     */
    public function view(User $user, vendedor $vendedor)
    {
        return $user->level == 5;
    }

    /**
     * Determine whether the user can create vendedors.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->level == 5;
    }

    /**
     * Determine whether the user can update the vendedor.
     *
     * @param  \App\User  $user
     * @param  \App\vendedor  $vendedor
     * @return mixed
     */
    public function update(User $user, vendedor $vendedor)
    {
        //
    }

    /**
     * Determine whether the user can delete the vendedor.
     *
     * @param  \App\User  $user
     * @param  \App\vendedor  $vendedor
     * @return mixed
     */
    public function delete(User $user, vendedor $vendedor)
    {
        //
    }

    /**
     * Determine whether the user can restore the vendedor.
     *
     * @param  \App\User  $user
     * @param  \App\vendedor  $vendedor
     * @return mixed
     */
    public function restore(User $user, vendedor $vendedor)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the vendedor.
     *
     * @param  \App\User  $user
     * @param  \App\vendedor  $vendedor
     * @return mixed
     */
    public function forceDelete(User $user, vendedor $vendedor)
    {
        //
    }
}
