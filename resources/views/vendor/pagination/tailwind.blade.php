@if ($paginator->hasPages())
    <nav class="my-4 mr-8 flex items-center justify-end">
        <ul class="flex gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link rounded bg-gray-300 px-3 py-1 text-gray-600">&laquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link rounded bg-blue-500 px-3 py-1 text-white"
                        href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link rounded bg-gray-300 px-3 py-1 text-gray-600">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span
                                    class="page-link rounded bg-blue-500 px-3 py-1 text-white">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link rounded bg-gray-300 px-3 py-1 text-gray-600"
                                    href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link rounded bg-blue-500 px-3 py-1 text-white" href="{{ $paginator->nextPageUrl() }}"
                        rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link rounded bg-gray-300 px-3 py-1 text-gray-600">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
