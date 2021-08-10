<?php

namespace App\reprositories;

use App\Models\User as model;
use Illuminate\Support\Facades\Auth;

class UsersReprositories extends coreReprository{



    protected function getModelClass(){
        return Model::class;
    }

    //Получаем данные авторизованного в текущий момент пользователя
    public function getForPolicy(){
      return  $this->startCondition()->find(Auth::id());
    }
}

