@extends('admin.layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12">
            <h1>Создание категории</h1>
            <form action="{{ route('admin.category.store') }}" method="POST">
                @csrf
                @include('admin.categories.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection