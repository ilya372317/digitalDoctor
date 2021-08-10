<?php

namespace App\reprositories;

use App\Models\User as model;
use Illuminate\Support\Facades\Auth;

class UsersReprositories extends coreReprository{



    protected function getModelClass(){
        return Model::class;
    }

    public function getForPolicy(){
      return  $this->startCondition()->find(Auth::id());
    }
}

