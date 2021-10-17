@if ($paginator->hasPages()	)

<!-- pagination -->
<div class="col-md-12">
    <div class="post-pagination">

    @if ($paginator->onFirstPage())
        <a href="" class="btn disabled pagination-back pull-left">@lang('pagination.previous')</a>
    @else
        <a href="{{$paginator->previousPageUrl()}}" class="pagination-back pull-left">@lang('pagination.previous')</a>
    @endif


    <ul class="pages">

        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" ><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </ul>


    @if ($paginator->hasMorePages())
        <a href="{{$paginator->nextPageUrl()}}" class="pagination-next pull-right">@lang('pagination.next')</a>
    @else
        <a href="" class="btn disabled pagination-next pull-right">@lang('pagination.next')</a>
    @endif


    </div>
</div>
<!-- pagination -->

@endif
