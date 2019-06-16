@extends ('admin.layouts.app')

@section('content')

    <div class="content">
        <div class="title categoryttl">Добавление обучающихся</div>
        <div class="librarian_add">
            @include('admin.books.partials.showErrors')
            <form data-toggle="validator" method='POST' id='addStudents'>
                @csrf

                <div class="form-group text-center">
				<span>В данном разделе вам предоставляется возможность редактирования поступления и убывания обучающихся.
				Для добавления обучающихся выберите курс, после чего выберите количество поступающих или убывающих обучающихся.
				В самом конце введите год в котором обучающийся будет учиться.</span>
                </div>
                <div class="form-group">
                    <label for="stud_class">Введите класс ученика(ов)</label>
                    @include('form_fields.text', [
                        'name' => 'stud_class',
                        'value' => '',
                        'id'=>'stud_class',
                        'required =>true',
                        'placeholder'=>'Введите класс',
                        'autocomplete'=>false,
                    ])
                </div>
                <div class="form-group">
                    <label for="stud_numb">Введите количество поступающих/убывающих обучающихся</label>
                    @include('form_fields.text', [
                        'name' => 'stud_count',
                        'value' => '',
                        'id'=>'stud_numb',
                        'required =>true',
                        'placeholder'=>'Введите количество обучающхся',
                        'autocomplete'=>false,
                    ])
                </div>
                <div class="form-group">
                    <label for="addDate">Введите год поступления ученика(ов)</label>
                    @include('form_fields.text', [
                        'name' => 'addDate',
                        'value' => date('Y'),
                        'id'=>'addDate',
                        'required =>true',
                        'placeholder'=>'Введите год поступления',
                        'autocomplete'=>false,
                    ])
                </div>
                <div class="form-group text-center">
                    <button type='submit' class='btn btn-primary' id='del_stud'>Добавить / удалить учеников</button>
                </div>
            </form>
        </div>
    </div>

@endsection