@extends('admin.layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12 admin-form">
            <h1 class="text-center">Создание книги</h1>
            <form action="{{ route('admin.book.store') }}" method="POST">
                @csrf
                @include('admin.books.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection