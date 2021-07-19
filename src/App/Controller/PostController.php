<?php

namespace App\Controller;

use App\Aware\CategoryRepositoryAware;
use App\Aware\CategoryRepositoryAwareTrait;

use App\Aware\ImageRepositoryAware;
use App\Aware\ImageRepositoryAwareTrait;

use App\Aware\PdoAware;
use App\Aware\PdoAwareTrait;

use App\Aware\PostRepositoryAware;
use App\Aware\PostRepositoryAwareTrait;

use App\Aware\TwigAware;
use App\Aware\TwigAwareTrait;

use App\Aware\RequestAware;
use App\Aware\RequestAwareTrait;

use App\Entity\Category;
use App\Entity\Image;
use App\Entity\Post;

use Symfony\Component\HttpFoundation\Response;


use Symfony\Component\HttpFoundation\ParameterBag;

class PostController extends SecurityController implements PdoAware, RequestAware, TwigAware, PostRepositoryAware, ImageRepositoryAware, CategoryRepositoryAware
{
    use PdoAwareTrait;
    use ImageRepositoryAwareTrait;
    use TwigAwareTrait;
    use RequestAwareTrait;
    use PostRepositoryAwareTrait;
    use CategoryRepositoryAwareTrait;

    public function annonce(): Response
    {

        return new Response($this->twig->render(
            'annonce.html.twig',
            ['annonce' => $this->Postrepo->getById($this->request->query->get('id'))]));
    }


    public function addAnnonce(): Response
    {
        if ($this->isConnected()) {

            if ($this->request->request->has('addPost')) {

                $newPost = new Post();
                $newPost->setTitle($this->request->request->get('adTitle'));
                $newPost->setPrice($this->request->request->get('adPrice'));
                $newPost->setContent($this->request->request->get('adContent'));
                $newPost->setPlace($this->request->request->get('adPlace'));

                $this->Postrepo->addPost($newPost);
            }

            if ($this->request->request->has('addPost')) {
                foreach ($this->request->request->get('img') as $key) {
                    $newimg = new Image();
                    $newimg->setUrl($key);
                    $newimg->setPostId($newPost->getId());
                    $this->Imagerepo->addImg($newimg);

                }

                foreach ($this->request->request->get('adCat') as $key) {
                    $newcat = new Category();
                    $newcat->setName($key);
                    $newcat->setPostId($newPost->getId());
                    $this->Categoryrepo->addCat($newcat);

                }

            }

            return new Response($this->twig->render(
                'new-annonce.html.twig',
            ));
        }

        return new Response($this->twig->render(
            'home.html.twig',
        ));

    }


}
