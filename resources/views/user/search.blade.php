@extends('layouts.userLayout')

@section('content')

    <div class="content">
        <div class="title categoryttl" id='title'>Найдено по запросу: {{\Illuminate\Support\Facades\Request::get('search_list')}}</div>
        <div class="somebook">
            @forelse($searchResult as $book)
                <div class='newbook'>
                    <img src="{{ asset('img/Books/DefaultBook.jpg') }}" alt="" width="18%">
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
                               <b>Добавлено: {{$book->created_at->toDateString()}}</b>
                               </span>
                    <span>{{ substr($book->about, 0, strpos(wordwrap($book->about, 150, "\n", true),"\n")).'...' }}</span>
                    <br>
                    <span><i class="fa fa-eye"></i>Просмотрено раз</span>
                </div>
            @empty
                <p class="alert alert-danger">Книги не найдены</p>
            @endforelse
        </div>
    </div>

@endsection