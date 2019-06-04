@extends('admin.layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12">
            <h1>Редактирование категории: {{ $category->name }}</h1>
            <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                <input type="hidden" name="_method" value="put">
                @csrf
                @include('admin.categories.partials.form')
            </form>
        </div>
    </div>
</div>

@endsection