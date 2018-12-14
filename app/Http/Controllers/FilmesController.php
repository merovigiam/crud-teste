<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use App\Models\ListaFilmes;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    protected function redirectTo()
    {
        return '/login';
    }

    public function listarFilmes()
    {
        $listaFilmes = new ListaFilmes();
        return view('filmes/topfilmes', ['listaFilmes' => $listaFilmes->getListaTotalByRank()]);
    }

    public function cadastrarFilme(Request $request)
    {
        Filme::criarFilme($request);
        return redirect('/topfilmes');
    }

    public function votarFilme($id)
    {
        if(isset($id)) {
            Filme::votarEmFilme($id);
        }
        return redirect('/topfilmes');
    }

    public function deletarFilme($id)
    {
        if(isset($id)) {
            Filme::deletarFilme($id);
        }
        return redirect('/topfilmes');
    }
}
