<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'religion' => 'required',
            'gender' => 'required',
            'phone_number' => 'required|unique:users',
            'batch' => 'required',
            'stream' => 'required',
            'year' => 'required',
            'state_of_origin' => 'required',


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'state_code' => '',
            'profile_pic' => 'noimage.jpg',
            'phone_number' => $data['phone_number'],
            'gender' => $data['gender'],
            'religion' => $data['religion'],
            'batch' => $data['batch'],
            'stream' => $data['stream'],
            'year' => $data['year'],
            'platoon' => '',
            'about_me' => '',
            'account_status' => 'inactive',
            'marital_status' => '',
            'whatsapp_number' => $data['phone_number'],
            'facebook_id' => '',
            'state_of_origin' => $data['state_of_origin'],
            'serving_state' => 20,
            'serving_lga' => '',
            'password' => bcrypt($data['password']),
        ]);
    }
}
