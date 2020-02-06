<?php


namespace App\Repositories\Interfaces;


interface BaseInterface
{
    public function setModel();

    public function create($attributes);

    public function getModel();
}
