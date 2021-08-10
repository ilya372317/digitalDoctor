<?php


namespace App\reprositories;

// Родительский класс для всех репрозиториев
abstract class coreReprository
{

    protected $model;

    // задаем в конструкторе, с какой моделью будет работать репрозиторий
    public function __construct(){

        $this->model = app($this->getModelClass());
    }


    // Здесь мы будем возврощать нужную нам модель

    abstract protected function getModelClass();

    // Все обращения к модели будут происходить через этот метод
    protected function startCondition(){
        return clone $this->model;
    }

}
