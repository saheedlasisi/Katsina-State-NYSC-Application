<?php

namespace App\Http\Controllers\ObsAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = 'obs/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    protected function guard(){

      return auth()->guard('obs');

}

  public function showLoginForm(){

    return view('ObsAuth.login');
  }
}
