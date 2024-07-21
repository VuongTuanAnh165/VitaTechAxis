<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserInterface;

/**
 * Class UserEloquent
 * @package App\Repositories
 */
class UserEloquent implements UserInterface
{
    public function getUserByEmailRole($email, $role)
    {
        return User::where('email', $email)
            ->where('role', $role)
            ->first();
    }
}
