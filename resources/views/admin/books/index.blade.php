@extends('admin.layouts.app')

@section('content')
    <div class="content">
        <div class="title categoryttl">Список книг</div>
        <div class="my-form__control">
            <a href="{{ route('admin.book.create') }}" class="btn btn-primary ml-auto"><i class="fa fa-plus"></i> Добавить</a>
            @include('admin.books.partials.showErrors')

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
                            <a href="{{ route('admin.book.edit', $book->id) }}" class="label label-primary" data-toggle="tooltip" data-placement="top" title="Редактировать">
                                <i class="fa fa-pencil"></i>
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

            @include('partials.links')

        </div>
    </div>
@endsection