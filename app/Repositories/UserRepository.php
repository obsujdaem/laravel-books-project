<?php


namespace App\Repositories;

use App\Models\User;

final class UserRepository extends BaseRepository
{
    public function getModel()
    {
        return User::getModel();
    }

    public function findByEmail($email)
    {
        return $this->model->whereEmail($email)->first();
    }
}
