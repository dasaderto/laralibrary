<div class="somebook">
{{--    <div class="container">--}}
        @forelse($books as $book)
            <div class="row newbook">
                <div class="book__img col-sm-3">
                    <img src=" {{ $book->image ? asset('img/Books/'.$book->image) : asset('img/Books/DefaultBook.jpg') }}" alt="">
                </div>
                <div class="book__content col-sm-9">
                    <h3><i class='fa fa-book'></i>
                        <a href="#">{{$book->name}}</a>
                    </h3>
                    <span class='author-title'>
                           <i class='fa fa-user'></i>
                           <b>Автор:</b>
                           <a href='#'>{{$book->author}}</a>
                </span>
                    <span class='author-title'>
                           <i class='fa fa-calendar'></i>
                           <b>Добавлено: {{ $book->created_at->toDateString() }}</b>
                           </span>
                    <span>
                    {{ strlen($book->about)>=150 ? substr($book->about, 0, strpos(wordwrap($book->about, 150, "\n", true),"\n")).'...' : $book->about }}
                </span>
                    <br>
                    <span class="text-right"><i class="fa fa-eye"></i>Просмотрено раз</span>
                </div>
            </div>
        @empty
            <p class="alert alert-danger">{{ $errorMsg }}</p>
        @endforelse
{{--    </div>--}}
</div>
