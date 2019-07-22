<?php

namespace App\Policies;

use App\User;
use App\Research;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResearchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the research.
     *
     * @param  \App\User  $user
     * @param  \App\Research  $research
     * @return mixed
     */
    public function view(User $user, Research $research)
    {
        //
    }

    /**
     * Determine whether the user can create researches.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    public function seeManagementMenu(User $user)
    {
        return in_array($user->getOriginal('type'), [User::TYPE_ADMIN, User::TYPE_RESEARCHER, User::TYPE_REGULAR]);
    }

    public function manageAll(User $user)
    {
        return in_array($user->getOriginal('type'), [User::TYPE_ADMIN]);
    }

    public function manageOwn(User $user)
    {
        return in_array($user->getOriginal('type'), [User::TYPE_RESEARCHER]);
    }

    /**
     * Determine whether the user can update the research.
     *
     * @param  \App\User  $user
     * @param  \App\Research  $research
     * @return mixed
     */
    public function update(User $user, Research $research)
    {
        //
    }

    /**
     * Determine whether the user can delete the research.
     *
     * @param  \App\User  $user
     * @param  \App\Research  $research
     * @return mixed
     */
    public function delete(User $user, Research $research)
    {
        if ($user->getOriginal("type") === User::TYPE_ADMIN) {
            return true;
        }

        if ($user->getOriginal("type") === User::TYPE_RESEARCHER &&
            $user->id === $research->poster_id &&
            $research->getOriginal("status") === Research::STATUS_UNAPPROVED
        ) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can restore the research.
     *
     * @param  \App\User  $user
     * @param  \App\Research  $research
     * @return mixed
     */
    public function restore(User $user, Research $research)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the research.
     *
     * @param  \App\User  $user
     * @param  \App\Research  $research
     * @return mixed
     */
    public function forceDelete(User $user, Research $research)
    {
        //
    }
}
