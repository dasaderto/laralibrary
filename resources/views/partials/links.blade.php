<ul class="pagination">
    @if($books->currentPage()==1)
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">В начало</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Предыдущая</a>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="/admin/book/page/1" tabindex="-1">В начало</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="/admin/book/page/{{ $books->currentPage()-1 }}" tabindex="-1">Previous</a>
        </li>
    @endif
    @for($i = 1; $i < $books->lastPage(); $i++)
        @if($books->currentPage() == $i)
            <li class="page-item active">
                <a class="page-link" href="/admin/book/page/{{ $i }}">{{ $i }}</a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="/admin/book/page/{{ $i }}">{{ $i }}</a></li>
        @endif
    @endfor
    @if($books->lastPage() == $books->currentPage())
        <li class="page-item disabled">
            <a class="page-link" href="#">Следующая</a>
        </li>
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">В конец</a>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="/admin/book/page/{{ $books->currentPage()+1 }}" tabindex="-1">Следующая</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="/admin/book/page/{{ $books->lastPage() }}" tabindex="-1">В конец</a>
        </li>
    @endif
</ul>