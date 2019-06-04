@extends('admin.layouts.app')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex align-items-center my-4">
                <h1>Список книг</h1>
                <a href="{{ route('admin.book.create') }}" class="btn btn-primary ml-auto"><i class="fas fa-plus"></i> Добавить</a>
            </div>
            <table class="border table table-borderless table-light">
                <thead>
                    <tr>
                        <th>№ записи</th>
                        <th>Название</th>
                        <th class="text-right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($books as $book)
                    <tr>
                        <td><span class="text-muted">#</span>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td class="text-right">
                            <a href="{{ route('admin.book.edit', $book->id) }}" class="badge badge-primary" data-toggle="tooltip" data-placement="top" title="Редактировать">
                                <i class="fas fa-pen"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3"><p class="alert alert-danger">Нет данных для отображения</p></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection