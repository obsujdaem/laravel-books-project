<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\api\AuthorizationRequest;
use App\Http\Resources\TokenResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserToken;
use App\Services\api\AuthorizationService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthorizationController extends Controller
{
    public function index(AuthorizationRequest $request, AuthorizationService $service)
    {
        $token = $service->auth($request);

        return $token ?
            response(new TokenResource($token), 200)
            :
            response('bad request', 400);
    }
}
