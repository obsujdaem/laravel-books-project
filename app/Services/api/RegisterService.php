<?php


namespace App\Services\api;


use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterService
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function save($request)
    {
        $formattedRequest = $this->formattedData($request);

        return $this->userRepository->create($formattedRequest);
    }

    private function formattedData($request)
    {
        $formattedData = $request->validated();

        $formattedData['password'] = Hash::make($request->password);

        $formattedData['remember_token'] = Str::random(10);

        return $formattedData;
    }
}
