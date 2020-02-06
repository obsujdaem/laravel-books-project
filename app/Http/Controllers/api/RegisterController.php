<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\api\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\api\RegisterService;

class RegisterController extends Controller
{
    public function create(RegisterRequest $request, RegisterService $service)
    {
        $result = $service->save($request);

        return $result ? response(new UserResource($result), 200) : abort(400, 'bad request');
    }
}
