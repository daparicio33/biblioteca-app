
@if ($paginator->hasPages())
<nav class="tm-gallery-nav">
    <ul class="nav justify-content-center">
        {{-- Enlace a la página anterior --}}
        @if ($paginator->onFirstPage())
            <li class="nav-item disabled"><span class="nav-link">Anterior</span></li>
        @else
            <li class="nav-item"><a href="{{ $paginator->previousPageUrl() }}" class="nav-link">Anterior</a></li>
        @endif

        {{-- Enlaces a las páginas --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="nav-item disabled"><span class="nav-link">{{ $element }}</span></li>
            @endif

            {{-- Página actual --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="nav-item active"><span class="nav-link">{{ $page }}</span></li>
                    @else
                        <li class="nav-item"><a href="{{ $url }}" class="nav-link">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Enlace a la página siguiente --}}
        @if ($paginator->hasMorePages())
            <li class="nav-item"><a href="{{ $paginator->nextPageUrl() }}" class="nav-link">Siguiente</a></li>
        @else
            <li class="nav-item disabled"><span class="nav-link">Siguiente</span></li>
        @endif
    </ul>
</nav>
@endif

