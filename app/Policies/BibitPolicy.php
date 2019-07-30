<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BibitPolicy
{
    use HandlesAuthorization;

    public function seeManagementMenu(User $user)
    {
        return in_array($user->getOriginal("type"), [User::TYPE_ADMIN]);
    }
}
