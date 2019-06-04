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
            <a class="navbar-brand" href="#">MyLib</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">Главная</a></li>

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
            <form class="navbar-form navbar-left" role="search" action="/search/" method="GET">
                <div class="form-group">
                    <input type="text" name="search_list" class="form-control" placeholder="Поиск..." size='20' autocomplete=off required minlength="3" maxlength="15">
                    <input type="hidden" name="page" value="1">
                </div>
                <button type="submit" class="btn btn-primary my-2 my-sm-0">Поиск</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>