<?php

use Illuminate\Database\Seeder;
use App\Models\Filme;

class FilmesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Filme::create([ 'nome' => 'The Shawshank Redemption (1994)', 'votos' => '10']);
        Filme::create([ 'nome' => 'The Godfather (1972)', 'votos' => '9']);
        Filme::create([ 'nome' => 'The Dark Knight (2008)', 'votos' => '8']);
        Filme::create([ 'nome' => 'The Godfather: Part II (1974)', 'votos' => '7']);
        Filme::create([ 'nome' => 'The Lord of the Rings: The Return of the King (2003)', 'votos' => '6']);
        Filme::create([ 'nome' => 'Pulp Fiction (1994)', 'votos' => '5']);
        Filme::create([ 'nome' => 'Schindlers List (1993)', 'votos' => '4']);
        Filme::create([ 'nome' => 'The Good, the Bad and the Ugly (1966)', 'votos' => '3']);

    }
}
