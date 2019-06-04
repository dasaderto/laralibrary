<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="shortcut icon" href="{{asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
</head>

<body>
<header>
   @include('partials.nav')
</header>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg-3 col-sm-3">
                <aside class="hidden-sm hidden-xs">
                    <div class="sidebar">
                        <div class="title">
                            Категории книг
                        </div>
                        <div class="sidecont">
                            <ul class="nav nav-pills nav-stacked left-menu" id="accordion">
                                <li>
                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="#">{{ $category->name }}</a>
                                    </li>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 ">
                @yield('content')
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3">
                <div class="share-panel">
                    <div class="title">Поделиться</div>
                    <div class="share-buttons" style='padding: 1.5rem;'>
                        <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,telegram"></div>
                    </div>
                </div>

                <div class="share-panel">
                    <div class="title">Авторы</div>
                    <div class="alphabet">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
    <div class="text-center">
        © 2018 Выполнил: Студент группы П-14
        <a href="https://vk.com/nikitos_ruli">Есипов Никита</a>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<script src="{{ asset('js/script.min.js') }}"></script>
<!-- <script src="/public/js/lib_js/packaged.min.js"></script> -->
<!-- j <script src="/public/js/lib_js/query.bootpag.min.js"></script> -->
<!-- <script src="/public/js/sort.js"></script> -->
</body>

</html>
