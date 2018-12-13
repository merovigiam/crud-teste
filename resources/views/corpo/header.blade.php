<nav class="navbar fixed-top navbar-expand-lg navbar-dark blue scrolling-navbar">
    <a class="navbar-brand" href="#">
        <strong>CRUD</strong>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @if( auth()->check() )
                <li class="nav-item">
                    <a class="nav-link" href="/atualizar">{{ auth()->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Sair</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="/cadastro">Cadastrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Entrar</a>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav nav-flex-icons">
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link"><i class="fa fa-instagram"></i></a>
            </li>
        </ul>
    </div>
</nav>

