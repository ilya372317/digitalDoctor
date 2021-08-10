@extends('layouts.app')
@section('content')
    @php
        /** @var \App\Models\BlogCategories $item */
    @endphp
    @if($item->exists)
        <form method="POST" action="{{route('admin.blog.post.update', $item->id)}}" enctype="multipart/form-data">
            @method('PATCH')
            @else
                <form method="POST" action="{{route('admin.blog.post.store')}}" enctype="multipart/form-data" >
                    @endif
                    @csrf
                    @if($errors->any())
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">☓</span>
                                    </button>
                                    {{ $errors->first() }}

                            </div>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                        <span aria-hidden="true">☓</span>
                                    </button>
                                    {{ session()->get('success')}}
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                @include('blog.admin.posts.includes.item_edit_main_col')
                            </div>
                            <div class="col-md-3">
                                @include('blog.admin.posts.includes.item_edit_add_col')
                            </div>
                        </div>
                    </div>
                        </div>
                </form>
                @if($item->exists)
                    <form method="POST" action="{{route('admin.blog.post.destroy',$item->id)}}">
                        @csrf
                        @method('DELETE')
                        <div class="justify-content-center row">
                            <div class="col-md-8">
                                <div class="card card-block">
                                    <div class="card-body ml-auto">
                                        <button type="submit" class="btn btn-link">Удалить</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
    @endif
@endsection
