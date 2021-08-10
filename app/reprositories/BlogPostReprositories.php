<?php


namespace App\reprositories;

use App\Models\BlogPostModels as model;

use App\Models\BlogPostModels;
use Illuminate\Pagination\Paginator;

class BlogPostReprositories extends coreReprository
{



    protected function getModelClass()
    {
        return model::class;
    }

    public function getForPaginate($itemPerPage){

        Paginator::useBootstrap();

        $columns = [
            'id',
            'category_id',
            'user_id',
            'slug',
            'title',
            'extra',
            'published_at',
            'is_published'];


        $result = $this->startCondition()
            ->select($columns)
            ->with(['category' => function($query){
                $query->select('id', 'title');
            },
                'user' => function($query){
                $query->select('id', 'name');
                }])
            ->paginate($itemPerPage);

        return $result;
    }

    public function getForEdit($id){
       return $this->startCondition()->find($id);
    }

    public function getForRestore($id){
        $item =   $this->startCondition()
        ->withTrashed()
        ->find($id);

        return $item;
    }

    public function getForView($id){
        $item = $this->startCondition();

    }
}
