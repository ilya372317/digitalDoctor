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

    // Метод получает данные для страници списка всех категорий

    public function getForPaginate($itemPerPage = 5){

        $columns = ['id', 'title', 'parent_id'];
        Paginator::useBootstrap();

        return $this->startCondition()
            ->select($columns)
            //выгребаем все id и title из родительской категории (parentCategory - названия метода реализуюшего связь один к одному в модели).
            ->with(['parentCategory' => function($query){
                $query->select('id', 'title');
            }])
            ->paginate($itemPerPage);
    }

    //Получаем данные для редактирования категории

    public function getForEdit($id){
        $item = $this->startCondition()
            ->find($id);

        return $item;
    }

    //Получаем данные, для вывода списка всех категорий, на странице редактирования категории
    public function getCategoryList(){
        $categoryList = BlogCategoryModels::query()
            ->select('id', 'title')
            ->get();
        return $categoryList;
    }

    //Получаем данные для восстоновления категории (удаленных методом softDelete)

    public function getForRestore($id){
        $item = $this->startCondition()
            ->withTrashed()
            ->find($id);

        return $item;
    }
}
