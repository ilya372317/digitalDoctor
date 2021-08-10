@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">☓</span>
                </button>
                {{ session()->get('success') }}
                @if(session()->exists('restore'))
                    <div class="link-black"></div>
                    <a href="{{route('admin.blog.category.restore', session()->get('restore'))}}">Восстоновить?</a>
            </div>
                @endif
            </div>
        </div>
    </div>
@endif
