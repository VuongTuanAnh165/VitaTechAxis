<?php

namespace App\Repositories\Eloquent;

use App\Helpers\Common;
use App\Models\User;
use App\Repositories\Interfaces\UserInterface;

/**
 * Class UserEloquent
 */
class UserEloquent implements UserInterface
{
    public function getUserByEmailRole($email, $role)
    {
        return User::where('email', $email)
            ->where('role', $role)
            ->first();
    }

    public function getUserByRoleWithSearch($role, $request, $pagination = PAGINATION_NUMBER)
    {
        $user = User::select(
            'id',
            'name',
            'role',
            'email',
            'phone',
            'image',
            'status'
        )->where('role', $role);
        if ($request->keySearch) {
            $keySearch = Common::escapeLike($request->keySearch);
            $user = $user->where('name', 'like', '%'.$keySearch.'%');
        }
        $pagination = $request->pagination ?? PAGINATION_NUMBER;
        $user = $user->orderByDesc('created_at')->paginate($pagination);

        return $user;
    }
}
