<?php


namespace App\Repositories;


use App\Models\UserToken;

class TokenRepository extends BaseRepository
{
    public function getModel()
    {
        return UserToken::getModel();
    }

    public function getToken($user)
    {
        return $this->model->whereUserId($user->id)->get();
    }
}
