<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-header">
            @if($item->is_published)
                Опубликованно
            @else
                Черновик
            @endif
        </div>
        <div class="card-body">
            <div class="card-title"></div>
            <div class="card-subtitle mb-2 text-muted"></div>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Осн. данные</a>
                </li>
                <li class="nav-item">
                    <a href="#adddata" class="nav-link" data-toggle="tab" role="tab">Доп. данные</a>
                </li>
            </ul>
            <br>
            <div class="tab-content">
                <div class="tab-pane active" id="maindata" role="tabpanel">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" value="{{old('title',$item->title)}}" name="title"
                        required
                        min="3">
                        <label for="content_raw">Статья</label>
                        <textarea name="content_raw" id="content_raw" rows="20" class="form-control">
                            {{old('content_raw', $item->content_raw)}}
                        </textarea>
                        <script src="{{url('node_modules/tinymce/jquery.tinymce.min.js')}}"></script>
                        <script src="{{url('node_modules/tinymce/tinymce.min.js')}}"></script>
                        <script>tinymce.init({ selector:'#content_raw',language:"ru"
                        });</script>
                    </div>
                </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select type="text" id="category_id" name="category_id" placeholder="Выберите категорию"
                            class="form-control" required>
                                @foreach($categoryList as $categoryOption)
                                    <option value="{{$categoryOption->id}}" @if($categoryOption->id == $item->category_id) selected @endif>
                                        {{$categoryOption->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Индификатор</label>
                            <input type="text" class="form-control" value="{{$item->slug}}" id="slug" name="slug" >
                        </div>
                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="extra" id="excerpt" rows="3" class="form-control">
                                {{old('extra',$item->extra)}}
                            </textarea>
                        </div>
                       @if(empty($item->image))
                        <div class="form-group">
                            <label for="image">Миниатюра записи</label>
                            <input type="file" name="image" id="image" value="Привет мир">
                        </div>
                        @endif
                        @if($item->image)
                        <img src="{{asset('/storage/'. $item->image)}}" alt="{{$item->image}}" class="img-fluid img-thumbnail" width="200px">
                               <div class="card"> <a href="{{route('admin.blog.post.deleteThumbnail', $item->id)}}" class="btn btn-primary stretched-link">Удалить миниатюру записи</a>
                               </div>
                        @endif
                        <div class="form-group">
                            <input type="hidden" name="is_published" value="0">
                            <input type="checkbox" name="is_published" class="form-check-input"
                                   id="is_published"
                            value="1"
                            @if($item->is_published) checked @endif>
                            <label for="is_published">Опубликованно</label>
                        </div>
                    </div>

                </div>

        </div>
    </div>
</div>
