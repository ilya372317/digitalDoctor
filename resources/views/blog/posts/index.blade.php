@extends('layouts.app')

@section('content')
<table>
    @foreach($paginate as $item)
        <tr>
        <td>{{$item->id}}</td>
            <td><a href="{{route('blog.post.single', $item->id)}}"">{{$item->title}}</a></td>
        <td>{{$item->created_at}}</td>
        </tr>
    @endforeach
</table>

@if($paginate->total()> $paginate->count())
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{$paginate->links()}}
            </div>
        </div>
    </div>
</div>
@endif
@endsection('content')
