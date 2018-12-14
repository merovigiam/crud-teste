@extends('corpo.default')
@section('content')
    <div class="flex-center position-ref full-height mt-5">
        <div class="content">
            <h1>Top list</h1>
            <div>
                <button data-toggle="collapse" data-target="#adicionarFilme" aria-expanded="false" aria-controls="adicionarFilme">Adicionar Filme</button>
            </div>



    <div id="adicionarFilme" class="collapse">
    <br>
    <form class="text-center border border-light p-5" method="POST" action="/cadastrar-filme">
        {{ csrf_field() }}
        <p class="h4 mb-4">Adicionar Filme</p>
        <input type="text" id="nome" name="nome"
               class="form-control mb-4" placeholder="Nome" maxlength="255" required="required">
        <button class="btn btn-info my-4 btn-block" type="submit">Cadastrar Filme</button>
    </form>
    <br>
</div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Rank</th>
            <th scope="col">Nome</th>
            <th scope="col">Votos</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($listaFilmes as $rank => $filme )
            <tr>
                <th scope="row">{{ $rank+1 }}</th>
                <td>{{ $filme->nome }}</td>
                <td>{{ $filme->votos }}</td>
                <td><button><a href="/votar/{{ $filme->id }}">Votar</a></button></td>
                <td><button><a href="/deletar/{{ $filme->id }}">Remover</a></button></td>
            </tr>
        @endforeach
        </tbody>
    </table>

        </div>
    </div>
@stop
