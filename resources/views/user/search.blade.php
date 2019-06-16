@extends('layouts.userLayout')

@section('content')

    <div class="content">
        <div class="title categoryttl" id='title'>Найдено по запросу: {{\Illuminate\Support\Facades\Request::get('search_list')}}</div>

        @include('partials.showBook',[
                'books' => $searchResult,
                'errorMsg' => 'По вашему запросу ничего не найдено',
        ])

    </div>

@endsection