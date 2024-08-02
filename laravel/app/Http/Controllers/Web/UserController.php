<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BusinessInterface;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $business;
    protected $user;

    /**
     * constructor.
     */
    public function __construct(
        BusinessInterface $business,
        UserInterface $user
    ) {
        $this->business = $business;
        $this->user = $user;
    }

    /**
     * login
     *
     * @return View
     */
    public function login()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('user.index');
        }
        $business = $this->business->show();

        return view('auth.index', compact('business'));
    }

    /**
     * customer
     *
     * @return View
     */
    public function index(Request $request)
    {
        $users = $this->user->getUserByRoleWithSearch(ROLE_CUSTOMER, $request);

        return view('user.index', compact('users'));
    }
}