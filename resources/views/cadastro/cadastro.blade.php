@extends('corpo.default')
@section('content')
    <div class="flex-center position-ref full-height mt-5">
        <div class="content">
            <form class="text-center border border-light p-5" method="POST" action="/cadastrar">
                {{ csrf_field() }}
                <p class="h4 mb-4">Cadastro no CRUD</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="text" id="name" name="name"
                       class="form-control mb-4" placeholder="Nome" value="{{ old('name') }}" maxlength="255">

                <input type="email" id="email" name="email"
                       class="form-control mb-4" placeholder="E-mail" value="{{ old('email') }}" maxlength="255">

                <input type="password" id="password" name="password"
                       class="form-control" placeholder="Senha" aria-describedby="defaultRegisterFormPasswordHelpBlock"
                       value="{{ old('password') }}">
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                    A senha deve conter no mínimo 8 characteres e 1 digito
                </small>
                <button class="btn btn-info my-4 btn-block" type="submit">Cadastrar</button>
                <p>Já é cadastrado?
                    <a href="/login">Entrar</a>
                </p>
            </form>
        </div>
    </div>
@stop
