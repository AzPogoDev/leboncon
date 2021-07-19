<?php


namespace App\Aware;


use App\Repository\UserRepository;

trait UserRepositoryAwareTrait
{
    private ?UserRepository $Userrepo = null;

    public function setUserRepository(UserRepository $Userrepository)
    {
        $this->Userrepo = $Userrepository;
    }

}