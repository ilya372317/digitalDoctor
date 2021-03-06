@extends('layouts.app')

@section('content')
    @include('blog.admin.category.includes.result_messeges')
   <div class="container">
       <div class="row justify-content-center">
           <div class="col-md-12">
               <nav class="navbar navbar-toggleable-md navbar-light bg-faded">

                   <a href="{{ route('admin.blog.category.create') }}" class="btn btn-primary">Добавить</a>
               </nav>
               <div class="card">
                   <div class="card-body">
                       <table class="table table-hover">
                           <thead>
                           <tr>
                               <th>#</th>
                               <th>Категория</th>
                               <th>Родитель</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($paginator as $item)
                               <tr>
                                   <td>{{$item->id}}</td>
                                   <td>
                                       <a href="{{route('admin.blog.category.edit', $item->id)}}">
                                           {{$item->title}}
                                       </a>
                                   </td>
                                   <td @if(in_array($item->parent_id, [0,1])) style="color:#ccc;" @endif >
                                       {{$item->parentTitle}}
                                   </td>
                               </tr>
                           @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>
       </div>

       @if($paginator->total() > $paginator->count())
           <br>
           <div class="row justify-content-center">
               <div class="col-md-12">
                   <div class="card">
                       <div class="card-body">
                           {{$paginator->links()}}
                       </div>
                   </div>
               </div>
           </div>
       @endif

   </div>
@endsection('content')
