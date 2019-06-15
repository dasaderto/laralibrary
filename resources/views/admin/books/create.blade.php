@extends('layouts.userLayout')

@section('content')
    <div class="content">
        <div class="title categoryttl">Загрузка Книг</div>
        <div class="my-form__control">
            @include('admin.books.partials.showErrors')

            @include('admin.books.partials.form')
        </div>
    </div>
@endsection
