<?php


namespace App\Repositories;


use App\Repositories\Interfaces\BaseInterface;

abstract class BaseRepository implements BaseInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = $this->getModel();
    }

    public function create($attributes)
    {
        return $this->model->create($attributes);
    }
}
