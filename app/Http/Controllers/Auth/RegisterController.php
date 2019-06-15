<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = 'admin/register';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages=[
            "reg_login.required" => "Введите логин!!!",
            "reg_login.unique" => "Логин занят...",
            "reg_login.string" => "Логин должен быть строкой",
            "role.required" => "Выберите роль пользователя",
            "role.integer" => "Код изменен, повторите попытку позже",
            "role.min" => "Код изменен, повторите попытку позже",
            "role.max" => "Код изменен, повторите попытку позже",
            "reg_password.required" => "Введите пароль!!!",
        ];

        return Validator::make($data, [
            'reg_login' => ['required', 'string', 'max:255','unique:users,name'],
            'role' => ['required', 'integer', 'min:1', 'max:3'],
            'reg_password' => ['required', 'string', 'min:8', 'confirmed'],
        ],$messages);
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
            'name' => $data['reg_login'],
            //'role' => $data['role'],
            'password' => Hash::make($data['reg_password']),
        ]);
    }
}
