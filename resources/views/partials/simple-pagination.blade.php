@if ($paginator->hasPages())
    <nav>
        <ul class="pagination flex space-x-5">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="btn btn-disabled mx-8" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn">@lang('pagination.next')</a></li>
            @else
                <li class="btn btn-disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
@endif