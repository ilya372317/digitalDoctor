<?php


namespace App\reprositories;
use App\Models\BlogCategoryModels;
use App\Models\BlogCategoryModels as model;
use Illuminate\Pagination\Paginator;


class BlogCategoryReprositories extends coreReprository
{

    protected function getModelClass()
    {
        return model::class;
    }

    public function getForPaginate($itemPerPage = 5){
        $columns = ['id', 'title', 'parent_id'];
        Paginator::useBootstrap();
        return $this->startCondition()
            ->select($columns)
            ->with(['parentCategory' => function($query){
                $query->select('id', 'title');
            }])
            ->paginate($itemPerPage);
    }

    public function getForEdit($id){
        $item = $this->startCondition()
            ->find($id);

        return $item;
    }

    public function getCategoryList(){
        $categoryList = BlogCategoryModels::query()
            ->select('id', 'title')
            ->get();
        return $categoryList;
    }

    public function getForRestore($id){
        $item = $this->startCondition()
            ->withTrashed()
            ->find($id);

        return $item;
    }
}
