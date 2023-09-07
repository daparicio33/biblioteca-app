<header class="tm-site-header">
    <h1 class="tm-site-name"><i class="fa fa-book" aria-hidden="true"></i> BIBLIOTECA VIRTUAL</h1>
    <p class="tm-site-description">IEST Perú Japón 2023</p>
    <nav class="navbar navbar-expand-md tm-main-nav-container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tmMainNav"
            aria-controls="tmMainNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse tm-main-nav" id="tmMainNav">
            <ul class="nav nav-fill tm-main-nav-ul">
                <li class="nav-item"><a class="nav-link active" href="{{ route('index') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('programas') }}">Programas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categorias') }}">Categorias</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="team.html">Our Team</a></li> --}}
                <li class="nav-item">
                    @if (Auth::check())
                        <a class="nav-link" href="{{ route('dashboard.index') }}">
                            <button> <i class="fa fa-graduation-cap" aria-hidden="true"></i> Mi Cuenta</button>
                        </a>
                    @else
                    <a class="nav-link" href="{{ route('dashboard.index') }}">
                        <button> <i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</button>
                    </a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
</header>
