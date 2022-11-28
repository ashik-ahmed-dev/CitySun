@if ($paginator->lastPage() > 1)
<nav class="custom-pagination-nav mt-4 mb-5">
    <ul class="pagination justify-content-center">
        <li class="page-item {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}"><a href="{{ $paginator->url(1) }}" class="page-link"><span class="ti-angle-left"></span></a></li>
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}"><a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a></li>
        @endfor
        <li class="page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}"><a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="page-link"><span class="ti-angle-right"></span></a></li>
    </ul>
</nav>
@endif
