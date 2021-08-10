@extends('layouts.admin-app')
@section('content')
<div id="global">
    <div class="container-fluid cm-container-white">
        <h2 style="margin-top:0;">Добро пожаловать в административную панель сайта цифровайврач.рф</h2> 
        <p>Здесь вы можете создавать новый посты, придумывать категории, загружать картинки. Процесс ведения блога увлекателен и объемен. Как его разработчик, надеюсь он доставит вам удовольствие ;)</p>
    </div>
    <div class="container-fluid">
        <div class="row cm-fix-height">
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="{{asset('img/me.jpg')}}" alt="Разработчик" class="img-responsive">
                        <br>
                        <p>Разработчки сайта</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="{{asset('img/myBooks.jpg')}}" alt="Книги" class="img-responsive">
                        <br>
                        <p>По этим книжкам делался сайт</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="{{asset('img/idea-helper.jpg')}}" alt="Components" class="img-responsive">
                        <br>
                        <p>Идейный вдохновитель проекта и автор блога</p>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
@endsection