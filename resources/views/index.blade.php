@extends('layouts.userLayout')

@section('content')

    <div class="content">
        <div class="title categoryttl" id='title'>Популярные книги в библиотеке</div>

            @include('partials.showBook',[
                'books' => $books,
                'errorMsg' => 'Книги не найдены',
            ])

    </div>

@endsection


