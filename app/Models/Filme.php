<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Filme extends Model
{

    protected $table = 'filme';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'votos'];
    protected $hidden = ['id, created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public static function criarFilme(Request $request)
    {
        $filme = new Filme();
        $filme->nome = $request->input('nome');
        $filme->votos = 1;
        return $filme->save();
    }

    public static function votarEmFilme($id)
    {
        $filmeAlvo = Filme::find($id);
        $filmeAlvo->votos++;
        $filmeAlvo->save();
    }

    public static function deletarFilme($id)
    {
        Filme::where('id',$id)->delete();
    }

    public static function listarFilmesByRank()
    {
        return Filme::orderBy('votos', 'desc')->get();
    }

}