@extends('corpo.default')
@section('content')

    <div class="flex-center position-ref full-height mt-5">
        <div class="content">
            <form class="text-center border border-light p-5" method="POST" action="/login">
                {{ csrf_field() }}
                <p class="h4 mb-4">Entrar</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" maxlength="255" required>
                <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Senha" maxlength="255" required>
                <div class="form-row mb-4">
                <a href="/reenviar-senha">Esqueceu sua senha?</a>
                <button class="btn btn-info btn-block my-4" type="submit">ENTRAR</button>
                <p>Não é cadastrado?
                    <a href="/cadastro">Cadastre-se</a>
                </p>
            </form>
        </div>
    </div>
@stop
