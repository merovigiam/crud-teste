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
        try {
            $filmeAlvo = Filme::find($id);
            $filmeAlvo->votos++;
            return $filmeAlvo->save();
        }
        catch(\Exception $ex) {
            return false;
        }
    }

    public static function deletarFilme($id)
    {
        try {
            return Filme::where('id',$id)->delete();
        }
        catch(\Exception $ex) {
            return false;
        }
    }

    public static function listarFilmesByRank()
    {
        return Filme::orderBy('votos', 'desc')->get();
    }

}