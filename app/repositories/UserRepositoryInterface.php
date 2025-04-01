<?php

namespace App\repositories;


interface UserRepositoryInterface
{
    public function register(array $data);

    public function login(array $data);

    public function logout();
   
}
