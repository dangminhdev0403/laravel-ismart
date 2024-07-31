<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function isAdmin(User $user)
    {
        return $user->role == 1;
    }

    public function isSeller(User $user)
    {
        return $user->role == 2;
    }

    public function isUser(User $user)
    {
        return $user->role == 3;
    }

}
