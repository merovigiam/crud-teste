<?php

namespace App\Models;


class ListaFilmes
{

    public function getListaTotalByRank()
    {
        return Filme::listarFilmesByRank();
    }
}