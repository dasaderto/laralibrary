<div class="form-group">
    <label>Название</label>
    @include('form_fields.text', ['name' => 'name', 'value' => $book->name])
</div>
<div class="form-group">
    <label>Автор</label>
    @include('form_fields.text', ['name' => 'author', 'value' => $book->author])
</div>
<div class="form-group">
    <label>Категория</label>
    @include('form_fields.select', ['name' => 'category_id', 'values' => $categories, 'saved_value' => $book->category_id])
</div>
<div class="form-group">
    <label>Дата издания</label>
    @include('form_fields.text', ['name' => 'date', 'value' => $book->date])
</div>
<div class="form-group">
    <label>Клаcс</label>
    @include('form_fields.text', ['name' => 'class', 'value' => $book->class])
</div>
<div class="form-group">
    <label>Изображение</label>
    @include('form_fields.text', ['name' => 'image', 'value' => $book->image])
</div>
<div class="form-group">
    <label>Ссылка</label>
    @include('form_fields.text', ['name' => 'file', 'value' => $book->file])
</div>
<div class="form-group">
    <label>book_access</label>
    @include('form_fields.text', ['name' => 'book_access', 'value' => $book->book_access])
</div>
<div class="form-group">
    <label>Описание</label>
    @include('form_fields.textarea', ['name' => 'about', 'value' => $book->about])
</div>
<button type="submit" class="btn btn-primary">Сохранить</button>