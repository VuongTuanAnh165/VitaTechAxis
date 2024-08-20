<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BusinessInterface;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->route('admin.user.index');
        }
        $business = $this->business->show();

        return view('auth.index', compact('business'));
    }

    /**
     * authenticate
     * @param Request $request
     * @return View
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only([
            'email',
            'password',        
        ]);
        $credentials['role'] = ROLE_ADMIN;
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.user.index')->with([
                'success' => __("messages.web.auth.success"),
            ]);
        }
        return redirect()->back()->with([
            'error' => __("messages.web.auth.error"),
        ]);
        //22222
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