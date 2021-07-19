<?php


namespace App\Controller;

use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;

class SecurityController implements RequestAware
{
    use RequestAwareTrait;

    public function isConnected(): bool
    {
        if ($this->request->getSession()->has('user')) {
            return true;
        }
        return false;
    }

    public function getConnectedUserName(): string
    {
        if ($this->isConnected()) {
            $useobj = $this->request->getSession()->get('user');
            $userconencted = $useobj->getNickname();
            return $userconencted;
        }

        return 'No User Connected';


    }
}