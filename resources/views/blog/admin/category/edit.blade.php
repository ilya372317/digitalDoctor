@extends('layouts.app')
@section('content')
    @php
/** @var \App\Models\BlogCategories $item */
@endphp
    <form method="POST" action="{{route('admin.blog.category.update', $item->id)}}" >
        @method('PATCH')
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
                    @include('blog.admin.category.includes.item_edit_main_col')
                </div>
                <div class="col-md-3">
                    @include('blog.admin.category.includes.item_edit_add_col')
                </div>
            </div>
        </div>
    </form>
            <form method="POST" action="{{route('admin.blog.category.destroy',$item->id)}}">
                @csrf
                @method('DELETE')
                <div class="justify-content-center row">
                    <div class="row col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn-danger">Удалить</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
@endsection
