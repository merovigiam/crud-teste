<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function __construct()
    {
//        $this->middleware('Authenticate');
    }

    public function realizerLogout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function realizarLogin(Request $request)
    {
        if (Auth::attempt($request->only(['email','password']))) {
            return redirect()->intended('/');
        } else {
            return redirect('/login')
                ->withErrors(['message' => 'O email não existe ou a senha está incorreta']);
        }
    }

    public function reenviarSenha(Request $request)
    {
        $email = $request->input('email');
        if(isset($email)) {
            $theUser = User::encontrarUser($request->input('email'));
            if(isset($theUser)) {
                return ('Funcionalidade não disponivel');
            }
            else {
                return ('Email não encontrado');
            }
        }
        else {
            return ('Email não encontrado');
        }
    }

    public function reenviarSenhaForm(Request $request)
    {
        return view('cadastro/reenviar');
    }
}
