<?php


namespace App\Repository;


use App\Aware\PdoAware;
use App\Aware\PdoAwareTrait;
use App\Entity\User;

class UserRepository implements PdoAware
{
    use PdoAwareTrait;


    function getOneByEmailAddress(string $emailAddress): User
    {
        $query = $this->pdo->prepare('SELECT * FROM `user` WHERE email = :emailAddress');
        $query->execute(['emailAddress' => $emailAddress]);

        if (!($data = $query->fetch())) {
            throw new \InvalidArgumentException(sprintf('The "User" with "emailAddress"="%s" is not found', $emailAddress));
        }


        $user = User::createFromData($data);

        return $user;
    }

    public function persist(User $user)
    {

        if ($user->getId()) {
            var_dump('Already Know');
        } else {
            $query = $this->pdo->prepare("INSERT INTO `user`( `email`, `password`, `nickname`) VALUES (:email, :pwd , :nick)");
            $query->execute([
                'email' => $user->getEmailAddress(),
                'pwd' => $user->getPlainPassword(),
                'nick' => $user->getNickName()
            ]);
        }
    }
}
