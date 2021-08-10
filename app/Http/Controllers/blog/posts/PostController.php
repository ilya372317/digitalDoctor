<?php

namespace App\Http\Controllers\blog\posts;

use App\Http\Controllers\Controller;
use App\Models\BlogPostModels;
use App\reprositories\BlogPostReprositories;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class PostController extends HomeController
{
    private $blogPostReprositories;

    public function __construct()
    {
        parent::__construct();

        $this->blogPostReprositories = app(BlogPostReprositories::class);
    }

    public function archivhePost(){
        Paginator::useBootstrap();
        $item = app(BlogPostModels::class);
         $paginate = $item->select('id', 'title','created_at')
        ->paginate(25);

        return view('blog.posts.index')->with(compact('paginate'));
    }

    public function singlePost($id){

        $item = $this->blogPostReprositories->getForView($id);



    }


}
