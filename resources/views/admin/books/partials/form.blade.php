<form action="{{ route('admin.book.store') }}" method="POST" enctype='multipart/form-data' id='uploadForm'>
    @csrf

    <div class="form-group">
        <label for="bookname" class="control-label">Введите название книги</label>
        @include('form_fields.text', [
            'name' => 'bookname',
            'value' => '',
            'id'=>'bookname',
            'required =>true',
            'placeholder'=>'Введите название',
            'autocomplete'=>false,
        ])
    </div>
    <div class="form-group">
        <label for="fileauthor" class="control-label">Введите автора (Пушкин А.С.)</label>
        @include('form_fields.datalist', [
            'list' => 'fileauthor',
            'name' => 'fileauthor',
            'id'=>'fileauthor',
            'required '=> 'true',
            'autocomplete' => 'off',
            'placeholder'=>'Введите автора',
            'value' => '',
            'values' => $authors,
            'data' => ''
        ])
    </div>
    <div class="form-group">
        <label for="category">Выберите категорию или добавьте свою.(Не допустите ошибку при вводе, будет создана новая категория)</label>
        @include('form_fields.datalist', [
            'list' => 'downloadcat',
            'name' => 'downloadcat',
            'id'=>'downloadcat',
            'required '=> 'true',
            'autocomplete' => 'off',
            'placeholder'=>'Введите категорию',
            'value' => '',
            'values' => $categories,
            'data' => 'name',
        ])
    </div>
    <div class="form-group">
        <label for="class">Для кого предназначена?</label>
        @include('form_fields.datalist', [
            'list' => 'class',
            'name' => 'class',
            'id'=>'class',
            'required '=> 'true',
            'autocomplete' => 'off',
            'placeholder'=>'Выберите класс',
            'values' => $classes,
            'data' => '',
        ])
    </div>
    <div class="form-group">
        <label for="level">Выберите уровень доступа</label>
        <select name="level" class="form-control">
            <option value="2">Доступна только зарегистрированным пользователям</option>
            <option value="1">Доступна всем</option>
        </select>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-md-6">
                <label for="fileimage">Выберите изображение</label>
                @include('form_fields.file', ['name' => 'fileimage','class'=> 'fileimage'])
            </div>
            <div class="col-md-6">
                <label for="filename">Выберите файл</label>
                @include('form_fields.file', ['name' => 'filename','class'=> 'filename'])
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="comment">Небольшое описание:</label>
        @include('form_fields.textarea', [
            'name' => 'about',
            'id'=>'comment',
            'placeholder'=>'Введите небольшое описание',
        ])
    </div>
    <div class="form-group text-center">
        <b><span id='userhelp'></span></b>
    </div>
    <div class="form-group text-center">
        <button type="submit" name="download" class="btn btn-primary" id="downbtn"><i class="fa fa-upload"></i> Загрузить</button>
    </div>
</form>