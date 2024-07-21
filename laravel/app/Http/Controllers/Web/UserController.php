<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\BusinessInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $business;

    /**
     * constructor.
     * @param BusinessInterface $business
     */
    public function __construct(
        BusinessInterface $business,
    ) {
        $this->business = $business;
    }

    /**
     * login
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
     * @return View
     */
    public function index()
    {
        return view('user.index');
    }
}
