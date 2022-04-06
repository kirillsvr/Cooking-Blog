@if ($paginator->hasPages())
    <div class="paginations">
        <ul class="d-flex flex-wrap justify-content-center">
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="d-none d-sm-block disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="d-none d-sm-block" aria-current="page"><a class="page-link active" href="javascript:void(0)">{{ $page }}</a></li>
                        @else
                            <li class="d-none d-sm-block"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </div>
@endif
