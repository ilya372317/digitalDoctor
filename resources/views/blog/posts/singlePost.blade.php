@extends('layouts.app')
@section('content')
@if($item->image)
<img src="{{asset('/storage/'. $item->image)}}" alt="{{$item->image}}" class="img-fluid img-thumbnail" width="200px">
       <div class="card"> <a href="{{route('admin.blog.post.deleteThumbnail', $item->id)}}" class="btn btn-primary stretched-link">Удалить миниатюру записи</a>
       </div>
@endsection