@extends('admin.layouts.app')

@section('content')

    <div class="content">
        <div class="title categoryttl">Регистрация</div>
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
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="reg_login" class="control-label">Введите логин</label>
                    <input type="text" name='reg_login' class="form-control" placeholder="Введите логин" autocomplete="false" required>
                    <span class="help-block loginerror"></span>
                </div>
                <div class="form-group">
                    <label for="reg_password" class="control-label">Введите пароль</label>
                    <div>
                        <input type="password" data-toggle="validator" name='reg_password' autocomplete="false" class="form-control" placeholder="Пароль" required>
                        <span class="help-block passerror"></span>
                    </div>
                    <div>
                        <label for="password2" class="control-label">Повторите пароль</label>
                        <input type="password" name='reg_password_confirmation' class="form-control" placeholder="Повторите пароль" required>
                        <div class="help-block condoerror"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="role">Выберите уровень доступа</label>
                    <select class="form-control" id="role" name="role">
                        <option value="1">Студент</option>
                        <option value="2">Учитель</option>
                        <option value="3">Администратор</option>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button type="submit" name='register' class="btn btn-primary" id='regbtn' style="margin:0.5rem 0rem;">Регистрация</button>
                </div>
            </form>
        </div>
    </div>

@endsection