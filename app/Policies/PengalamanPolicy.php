<?php

namespace App\Policies;

use App\User;
use App\Pengalaman;
use Illuminate\Auth\Access\HandlesAuthorization;

class PengalamanPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any pengalamen.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the pengalaman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengalaman  $pengalaman
     * @return mixed
     */
    public function view(User $user, Pengalaman $pengalaman)
    {
        //
    }

    /**
     * Determine whether the user can create pengalamen.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->getOriginal("type"), [
            User::TYPE_REGULAR, User::TYPE_RESEARCHER, User::TYPE_GOVERNMENT
        ]);
    }

    public function manage(User $user)
    {
        return true;
        //return !in_array($user->getOriginal("type"), [User::TYPE_ADMIN]);
    }

    public function manageOwn(User $user)
    {
        return in_array($user->getOriginal("type"), [
            User::TYPE_REGULAR, User::TYPE_RESEARCHER, User::TYPE_GOVERNMENT
        ]);
    }

    /**
     * Determine whether the user can update the pengalaman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengalaman  $pengalaman
     * @return mixed
     */
    public function update(User $user, Pengalaman $pengalaman)
    {
        return $user->id === $pengalaman->poster_id;
    }

    /**
     * Determine whether the user can delete the pengalaman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengalaman  $pengalaman
     * @return mixed
     */
    public function delete(User $user, Pengalaman $pengalaman)
    {
        return $user->id === $pengalaman->poster_id;
    }

    /**
     * Determine whether the user can restore the pengalaman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengalaman  $pengalaman
     * @return mixed
     */
    public function restore(User $user, Pengalaman $pengalaman)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the pengalaman.
     *
     * @param  \App\User  $user
     * @param  \App\Pengalaman  $pengalaman
     * @return mixed
     */
    public function forceDelete(User $user, Pengalaman $pengalaman)
    {
        //
    }
}
