@extends('corpo.default')
@section('content')

    <div class="flex-center position-ref full-height mt-5">
        <div class="content">
            <form class="text-center border border-light p-5" method="POST" action="/reenviar-senha">
                {{ csrf_field() }}
                <p class="h4 mb-4">Reenvio da Senha</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" maxlength="255">
                <button class="btn btn-info btn-block my-4" type="submit">Reenviar minha senha</button>
                <p>
                    <a href="/login">Entrar</a>
                </p>
            </form>
        </div>
    </div>
@stop
