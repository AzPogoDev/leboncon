<?php


namespace App\Aware;

use App\Repository\UserRepository;

interface UserRepositoryAware
{
    public function setUserRepository(UserRepository $userRepository);
}

