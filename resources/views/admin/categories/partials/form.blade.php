<div class="form-group">
    <label>Название</label>
    @include('form_fields.text', ['name' => 'name', 'value' => $category->name ])
</div>
<div class="form-group">
    <label>URL</label>
    @include('form_fields.text', ['name' => 'slug', 'value' => $category->slug ])
    <small class="form-text">Оставьте пустым для автоматической генерации</small>
</div>
<button type="submit" class="btn btn-primary">Сохранить</button>