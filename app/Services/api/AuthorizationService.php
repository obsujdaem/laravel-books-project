<?php


namespace App\Services\api;


use App\Repositories\TokenRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthorizationService
{
    protected $userRepository;
    protected $tokenRepository;

    public function __construct(UserRepository $userRepository, TokenRepository $tokenRepository)
    {
        $this->userRepository = $userRepository;
        $this->tokenRepository = $tokenRepository;
    }

    public function auth($request)
    {
        if (!$user = $this->userRepository->findByEmail($request->email)) {
            return null;
        }

        if (!$this->checkPassword($user->password, $request->password)) {
            return null;
        }

        return $this->getToken($user) ?
            $token = $this->tokenRepository->getToken($user)->last()
            :
            abort(400, 'failed auth');
    }

    public function checkPassword($user, $request): bool
    {
        return Hash::check($request, $user);
    }

    public function getToken($user): bool
    {
        $this->tokenRepository->create([
            'user_id' => $user->id,
            'token' => Uuid::uuid4(),
        ]);

        return true;
    }
}
