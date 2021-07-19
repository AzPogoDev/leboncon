<?php

namespace App\Controller;

use App\Aware\CategoryRepositoryAware;
use App\Aware\CategoryRepositoryAwareTrait;
use App\Aware\PostRepositoryAware;
use App\Aware\PostRepositoryAwareTrait;
use App\Aware\TwigAware;
use App\Aware\TwigAwareTrait;
use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends SecurityController implements RequestAware, TwigAware, PostRepositoryAware, CategoryRepositoryAware
{

    use TwigAwareTrait;
    use RequestAwareTrait;
    use PostRepositoryAwareTrait;
    use CategoryRepositoryAwareTrait;


    public function home(): Response
    {
       

        if ($this->request->getSession()->get('user')) {
            $useobj = $this->request->getSession()->get('user');
            $userconencted = $useobj->getNickname();
        }

        return new Response($this->twig->render(

            'home.html.twig', [
                'annonces' => $this->Postrepo->getAll(),
                'categoris' => $this->Categoryrepo->getAllCat(),
                'couser' => $userconencted ?? ''

            ]
        ));
    }

}


