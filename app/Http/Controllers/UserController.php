<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['nullable','string', 'max:255'],
            'password' => ['nullable','string', 'min:8'],
        ]);
    }

    public function atualizarDadosForm()
    {
        return view('cadastro/editar', ['name' => Auth::user()->name ]);
    }

    public function atualizarDados(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('/atualizar')
                ->withErrors($validator)
                ->withInput($request->all);
        }
        else {
            $theUser = User::find(Auth::id());
            if ($request->input('name') != '') {
                $theUser->name = $request->input('name');
            }
            if ($request->input('password') != '') {
                $theUser->password = Hash::make($request->input('password'));
            }
            $theUser->save();
        }
        return redirect('/');
    }


}
