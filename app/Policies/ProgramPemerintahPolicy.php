<?php

namespace App\Policies;

use App\User;
use App\ProgramPemerintah;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramPemerintahPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any program pemerintahs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    public function manageAny(User $user)
    {
        return $user->getOriginal("type") === User::TYPE_ADMIN;
    }

    /**
     * Determine whether the user can view the program pemerintah.
     *
     * @param  \App\User  $user
     * @param  \App\ProgramPemerintah  $programPemerintah
     * @return mixed
     */
    public function view(User $user, ProgramPemerintah $programPemerintah)
    {
        //
    }

    /**
     * Determine whether the user can create program pemerintahs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the program pemerintah.
     *
     * @param  \App\User  $user
     * @param  \App\ProgramPemerintah  $programPemerintah
     * @return mixed
     */
    public function update(User $user, ProgramPemerintah $programPemerintah)
    {
        //
    }

    /**
     * Determine whether the user can delete the program pemerintah.
     *
     * @param  \App\User  $user
     * @param  \App\ProgramPemerintah  $programPemerintah
     * @return mixed
     */
    public function delete(User $user, ProgramPemerintah $programPemerintah)
    {
        //
    }

    /**
     * Determine whether the user can restore the program pemerintah.
     *
     * @param  \App\User  $user
     * @param  \App\ProgramPemerintah  $programPemerintah
     * @return mixed
     */
    public function restore(User $user, ProgramPemerintah $programPemerintah)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the program pemerintah.
     *
     * @param  \App\User  $user
     * @param  \App\ProgramPemerintah  $programPemerintah
     * @return mixed
     */
    public function forceDelete(User $user, ProgramPemerintah $programPemerintah)
    {
        //
    }
}
