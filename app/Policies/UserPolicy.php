<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, User $target_user)
    {
        if ($target_user->articles()->count() > 0) {
            return false;
        }

        if ($target_user->researches()->count() > 0) {
            return false;
        }

        if ($user->getOriginal('type') != 'admin') {
            return false;
        }

        if ($target_user->id == $user->id) {
            return false;
        }

        return true;
    }
}
