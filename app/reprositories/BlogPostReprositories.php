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

    //Получаем данные для страницы всех постов

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
            //выгребаем данные из моделей категорий и пользователей
            //(category, user - названия методов реализуюшего связь один ко многим в модели).
            ->with(['category' => function($query){
                $query->select('id', 'title');
            },
                'user' => function($query){
                $query->select('id', 'name');
                }])
            ->paginate($itemPerPage);

        return $result;
    }

    //Получаем данные для редактирования поста
    public function getForEdit($id){
       return $this->startCondition()->find($id);
    }


    //Получаем данные для восстоновления поста
    public function getForRestore($id){
        $item =   $this->startCondition()
        ->withTrashed()
        ->find($id);

        return $item;
    }
}
