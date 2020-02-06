<?php


namespace App\Repositories;


use App\Models\UserToken;
use Illuminate\Support\Facades\DB;

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

    public function getAllOverdueTokens()
    {
        return $this->model->where('created_at', '<', DB::raw('NOW() - INTERVAL 1 HOUR'))->get();
    }
}
