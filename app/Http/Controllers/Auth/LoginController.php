<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');


       
        if (Auth::attempt($credentials)) {

            if (Auth::user()->user_type == "admin") {
                return redirect('/dashboard');
            }

            elseif(Auth::user()->account_type == "Free")
            {
                return redirect('/free-dashboard');
            }
            else
            {
                if(Auth::user()->account_type == "Unpaid")
                {
                    return redirect('/free-dashboard');
                }
                else
                {
                    return redirect('/premium-dashboard');
                }
            }
        }

        

        return redirect("/login")->with('message', 'Opps! You have entered invalid credentials');
    }
}
