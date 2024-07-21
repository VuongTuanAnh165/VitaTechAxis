<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserInterface
 * @package App\Repositories
 */
interface UserInterface
{
    public function getUserByEmailRole($email, $role);
}
