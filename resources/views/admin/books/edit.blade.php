@extends('admin.layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12">
            <h1>Редактирование книги: {{ $book->name }}</h1>
            <form action="{{ route('admin.book.update', $book->id) }}" method="POST">
                <input type="hidden" name="_method" value="put">
                @csrf
                @include('admin.books.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection