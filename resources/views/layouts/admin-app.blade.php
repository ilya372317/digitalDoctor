<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="{{asset('css/admin/bootstrap-clearmin.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/admin/roboto.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/admin/material-design.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/admin/small-n-flat.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('css/font-awesome.css')}}">
        
 

            <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <title>Цифровой Врач</title>
    </head>
    <body class="cm-no-transition cm-1-navbar">
    <main class="py-4">
        <div id="cm-menu">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="cm-flex"><a href="index.html" class="cm-logo"></a></div>
                <div class="btn btn-primary md-menu-white" data-toggle="cm-menu"></div>
            </nav>
            <div id="cm-menu-content">
                <div id="cm-menu-items-wrapper">
                    <div id="cm-menu-scroller">
                        <ul class="cm-menu-items">
                            <li class="active"><a href="{{ route('admin.blog.index') }}" class="sf-house">Главная</a></li>
                            <li class="cm-submenu">
                                <a class="sf-window-layout">Записи <span class="caret"></span></a>
                                <ul>
                                    <li><a href="{{route('admin.blog.post.index')}}">Все записи</a></li>
                                    <li><a href="{{route('admin.blog.post.create')}}">Новая запись</a></li>
                                </ul>
                            </li>
                            <li class="cm-submenu">
                                <a class="sf-window-layout">Категории <span class="caret"></span></a>
                                <ul>
                                    <li><a href="{{route('admin.blog.category.index')}}">Все категории</a></li>
                                    <li><a href="{{route('admin.blog.category.create')}}">Новая категория</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <header id="cm-header">
            <nav class="cm-navbar cm-navbar-primary">
                <div class="btn btn-primary md-menu-white hidden-md hidden-lg" data-toggle="cm-menu"></div>
                <div class="cm-flex">
                    <h1>Главная</h1> 
                    <form id="cm-search" action="index.html" method="get">
                        <input type="search" name="q" autocomplete="off" placeholder="Search...">
                    </form>
                </div>
                <div class="pull-right">
                    <div id="cm-search-btn" class="btn btn-primary md-search-white" data-toggle="cm-search"></div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-notifications-white" data-toggle="dropdown"> <span class="label label-danger">23</span> </button>
                    <div class="popover cm-popover bottom">
                        <div class="arrow"></div>
                        <div class="popover-content">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading text-overflow">
                                        <i class="fa fa-fw fa-envelope"></i> Nunc volutpat aliquet magna.
                                    </h4>
                                    <p class="list-group-item-text text-overflow">Pellentesque tincidunt mollis scelerisque. Praesent vel blandit quam.</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">
                                        <i class="fa fa-fw fa-envelope"></i> Aliquam orci lectus
                                    </h4>
                                    <p class="list-group-item-text">Donec quis arcu non risus sagittis</p>
                                </a>
                                <a href="#" class="list-group-item">
                                    <h4 class="list-group-item-heading">
                                        <i class="fa fa-fw fa-warning"></i> Holy guacamole !
                                    </h4>
                                    <p class="list-group-item-text">Best check yo self, you're not looking too good.</p>
                                </a>
                            </div>
                            <div style="padding:10px"><a class="btn btn-success btn-block" href="#">Show me more...</a></div>
                        </div>
                    </div>
                </div>
                <div class="dropdown pull-right">
                    <button class="btn btn-primary md-account-circle-white" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu">
                        <li class="disabled text-center fa fa-beer">
                            <a style="cursor:default;"><strong>{{$userName}}</strong></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-cog"></i> Settings</a>
                        </li>
                        <li>
                            <a href="login.html"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
      
            @yield('content')
           
       
            <footer class="cm-footer"><span class="pull-left">Цифровая фабрика</span><span class="pull-right">&copy; Илья Отинов</span></footer>
        </div>
        <script src="{{asset('js/admin/lib/jquery.min.js')}}"></script>
        <script src="{{asset('js/admin/jquery.mousewheel.min.js')}}"></script>
        <script src="{{asset('js/admin/jquery.cookie.min.js')}}"></script>
        <script src="{{asset('js/fastclick.min.js')}}"></script>
        <script src="{{asset('js/admin/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/admin/clearmin.min.js')}}"></script>
        <script src="{{asset('js/admin/demo/home.js')}}"></script>
    </main>
</body>
</html>
