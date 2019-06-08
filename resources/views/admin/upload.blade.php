@extends('layouts.userLayout')

@section('content')
<div class="content">
    <div class="title categoryttl">Загрузка Книг</div>
    <div class="registration">
        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('message'))
            <p class="alert alert-{{ Session::get('msg_type') }}">{{ Session::get('message') }}</p>
        @endif
        <form data-toggle="validator" role="form" method='POST' enctype='multipart/form-data' id='uploadForm'>
            @csrf

            <div class="form-group">
                <label for="bookname" class="control-label">Введите название загружаемого файла</label>
                <input type="text" name='bookname' id='bookname' class="form-control" placeholder="Введите название" required>
            </div>
            <div class="form-group">
                <label for="fileauthor" class="control-label">Введите автора (Пушкин А.С.)</label>
                <input list="fileauthor" name='fileauthor' class="form-control" placeholder="Введите автора" required autocomplete=off">
                <datalist id='fileauthor'>

                </datalist>
            </div>
            <div class="form-group">
                <label for="category">Выберите категорию или добавьте свою.(Не допустите ошибку при вводе, будет создана новая категория)</label>
                <input name="downloadcat" list='downloadcat' class="form-control" placeholder='Введите категорию'>
                <datalist id='downloadcat' name="downloadcat">

                </datalist>
            </div>
            <div class="form-group">
                <label for="class">Для кого предназначена?</label>
                <select name="class" class="form-control">
                    <option disabled selected>Выберите класс</option>
                    <option>10 класс</option>
                    <option>11 класс</option>
                    <option>1 курс</option>
                    <option>2 курс</option>
                    <option>3 курс</option>
                    <option>4 курс</option>
                    <option>Прочее</option>
                </select>
            </div>
            <div class="form-group">
                <label for="level">Выберите уровень доступа</label>
                <select name="level" class="form-control">
                    <option value="1">Доступна всем</option>
                    <option value="2">Доступна только зарегистрированным пользователям</option>
                </select>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="fileimage">Выберите изображение</label>
                        <input type="file" name='fileimage' class='form-control-file fileimage' accept=".jpeg,.png,.jpg">
                    </div>
                    <div class="col-md-6">
                        <label for="filename">Выберите файл</label>
                        <input type="file" name='filename' id='filename' class='form-control-file filename' accept=".pdf,.docx,.doc">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="comment">Небольшое описание:</label>
                <textarea class="form-control" rows="3" name='about' id="comment"></textarea>
            </div>
            <div class="form-group text-center">
                <b><span id='userhelp'></span></b>
            </div>
            <div class="form-group text-center">
                <button type="submit" name="download" class="btn btn-primary" id="downbtn"><i class="fa fa-upload"></i> Загрузить</button>
            </div>
        </form>
    </div>
</div>
@endsection