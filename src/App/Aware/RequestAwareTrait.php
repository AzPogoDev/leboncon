<?php


namespace App\Aware;

use Symfony\Component\HttpFoundation\Request;


trait RequestAwareTrait
{

    protected ?Request $request = null;

    public function setRequest(Request $request)
    {
        $this->request = $request;
    }

}