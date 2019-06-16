<nav class="navbar navbar-inverse" style="border-radius: 0px;">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">MyLib</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Главная</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-sm hidden-xs" data-toggle="dropdown">Жанры<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach ($categories as $category)
                            <li>
                                <a href="#">{{ $category->name }}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-sm hidden-xs" data-toggle="dropdown">Авторы<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="#"></a>
                        </li>
                    </ul>
                </li>
                <li class="hidden-md hidden-lg"><a href="#">Авторы</a></li>
                <li class="hidden-md hidden-lg"><a href="#">Категории</a></li>
                <li><a href="#">О системе</a></li>
                <li><a href="#">Загрузка файла</a></li>
                <li><a href="{{ route('admin.index') }}">Админка</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search" action="/search" method="GET">
                <div class="form-group">
                    @include('form_fields.text', [
                        'name' => 'search_list',
                        'value' => '',
                        'id'=>'bookname',
                        'required =>true',
                        'placeholder'=>'Поиск...',
                        'autocomplete' => 'off',
                    ])
                </div>
                <button type="submit" class="btn btn-primary my-2 my-sm-0">Поиск</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>
                            @guest
                                Войти
                            @else
                                Здравствуйте, {{\Illuminate\Support\Facades\Auth::user()->name}}
                            @endguest
                        </b> <span class="caret"></span>
                    </a>
                    <ul id="login-dp" class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    @if (isset($errors) && count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @guest
                                        <form method="POST" action="{{ route('login') }}" id="login-nav">
                                            @csrf
                                                <div class="form-group">
                                                    <i class='fa fa-user'></i>
                                                    <label  for="authlogin">Логин</label>
                                                    <input type="text" class="form-control" id="authlogin" placeholder="Логин" name="name" required>
                                                </div>
                                                <div class="form-group">
                                                    <i class='fa fa-unlock-alt'></i>
                                                    <label  for="pass">Пароль</label>
                                                    <input type="password" class="form-control" id="pass" placeholder="Пароль" name="password" required>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Запомнить меня') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group" >
                                                    <button type="submit" class="btn btn-primary btn-block" id="authbtn" style="margin-top:5%;">Войти <i class="fa fa-sign-in"></i></button>
                                                </div>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('logout') }}" id="login-nav">
                                            @csrf
                                            <div class="form-group" >
                                                <button type="submit" name="out" class="btn btn-primary btn-block" style='margin-top:5%;'>Выйти <i class="fa fa-sign-out"></i></button>
                                            </div>
                                        </form>
                                    @endguest

                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>