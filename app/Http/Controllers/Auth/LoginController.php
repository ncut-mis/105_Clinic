<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest')->except('logout');
        $this->request = $request;
    }

    public function redirectTo()
    {
        $position_id=Auth::user()->position_id;

        if ($this->request->has('previous'))
        {
            if($position_id == 1||$position_id ==2||$position_id ==3)
            {
                return '/register/index';
            }
            if($position_id == 4)
            {
                return '/doctor/home';
            }
            else
            {
              $this->redirectTo = $this->request->get('previous');
            }
        }
        return $this->redirectTo ?? '/home';
    }
}
