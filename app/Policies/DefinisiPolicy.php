<?php

namespace App\Policies;

use App\User;
use App\Definisi;
use Illuminate\Auth\Access\HandlesAuthorization;

class DefinisiPolicy
{
    use HandlesAuthorization;

    public function seeManagementMenu(User $user)
    {
        return in_array($user->getOriginal("type"), [User::TYPE_ADMIN]);
    }

    public function viewAny(User $user)
    {
        return in_array($user->getOriginal("type"), [User::TYPE_ADMIN]);
    }

    public function create(User $user)
    {
        return in_array($user->getOriginal("type"), [User::TYPE_ADMIN]);
    }

    public function update(User $user, Definisi $definisi)
    {
        return in_array($user->getOriginal("type"), [User::TYPE_ADMIN]);
    }

    public function delete(User $user, Definisi $definisi)
    {
        return in_array($user->getOriginal("type"), [User::TYPE_ADMIN]);
    }
}
