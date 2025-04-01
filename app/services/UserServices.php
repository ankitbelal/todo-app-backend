<?php

namespace App\services;
use App\repositories\UserRepositoryInterface;


class UserServices
{
    /**
     * Create a new class instance.
     */
    public function __construct(private UserRepositoryInterface $userRepository)
    {
        
    }

    public function login(array $data)
    {
        return $this->userRepository->login($data);
    }

    public function register(array $data)
    {
        return $this->userRepository->register($data);
    }


    public function logout()
    {
        return $this->userRepository->logout();
    }
}

