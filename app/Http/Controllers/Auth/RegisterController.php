<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;
use Psy\Util\Json;


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
    protected $redirectTo = '/';

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
        return User::criarValidador($data);
    }

    public function telaLogin()
    {
        return view('cadastro/login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::criarUsuario($data);
    }

    protected function criarTelaCadastro()
    {
        return view('cadastro/cadastro');
    }

    public function criarUsuario(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('/cadastro')
                ->withErrors($validator)
                ->withInput($request->all);
        }
        else {
            $user = $this->create($request->all());
            Auth::login($user);
        }
        return redirect('/');
    }



}
