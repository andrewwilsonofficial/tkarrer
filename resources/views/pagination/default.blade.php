@if ($paginator->lastPage() > 1)
    <nav aria-label="...">
        <ul class="pagination p-0">
            <li class="page-item{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="page-link m-0" href="{{ $paginator->url(1) }}" tabindex="-1">التالي</a>
            </li>
            @php
                $start = max(1, $paginator->currentPage() - 1);
                $end = min($paginator->lastPage(), $start + 3);
            @endphp
            @for ($i = $start; $i <= $end; $i++)
                <li class="page-item{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link m-0" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                <a class="page-link m-0" href="{{ $paginator->url($paginator->currentPage()+1) }}">السابق</a>
            </li>
        </ul>
    </nav>
@endif
