@if ($paginator->hasPages())

    <div class="card-footer clearfix">

        <ul class="pagination pagination-sm m-0 float-end">

            {{-- Boton anterior --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Anterior</a></li>
            @endif

            {{-- Paginas --}}
            @foreach ($elements as $element)
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item disabled"><a class="page-link" href="#">{{ $page }}</a></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endforeach


            {{-- Boton siguiente --}}
            @if (!$paginator->hasMorePages())
                <li class="page-item disabled"><a class="page-link" href="#">Siguiente</a></li>
            @else
                <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Siguiente</a></li>
            @endif

        </ul>


    </div>
@endif
