<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserInterface
 */
interface UserInterface
{
    public function getUserByEmailRole($email, $role);

    public function getUserByRoleWithSearch($role, $request);
}
