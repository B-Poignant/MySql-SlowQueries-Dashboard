<?php

namespace App\Policies;

use App\User;
use App\Import;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImportPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the import.
     *
     * @param  \App\User  $user
     * @param  \App\Import  $import
     * @return mixed
     */
    public function view(User $user, Import $import)
    {
        return $user->id === $import->user_id;
    }

    /**
     * Determine whether the user can update the import.
     *
     * @param  \App\User  $user
     * @param  \App\Import  $import
     * @return mixed
     */
    public function update(User $user, Import $import)
    {
        return $user->id === $import->user_id;
    }

    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the import.
     *
     * @param  \App\User  $user
     * @param  \App\Import  $import
     * @return mixed
     */
    public function delete(User $user, Import $import)
    {
        return $user->id === $import->user_id;
    }
}
