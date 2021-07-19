<?php

namespace App\Aware;

use App\Repository\CategoryRepository;
use App\Repository\ImageRepository;
use App\Repository\postRepository;
use App\Repository\UserRepository;
use PDO;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Symfony\Component\HttpFoundation\ParameterBag;

class AwareManager
{
    private Request $request;

    private ?PDO $pdo = null;

    private ?Environment $twig = null;

    private ?postRepository $postrepository = null;

    private ?ImageRepository $imagerepository = null;

    private ?CategoryRepository $categoryrepository = null;

    private ?UserRepository $userrepository = null;


    public function __construct(Request $request)
    {

        $this->request = $request;
    }


    public function manage(object $object)
    {
        if ($object instanceof PdoAware) {
            if (!$this->pdo) {
                $this->pdo = new PDO('mysql:host=localhost;dbname=leboncon', 'root');
            }

            $object->setPdo($this->pdo);
        }

        if ($object instanceof RequestAware) {
            $object->setRequest($this->request);
        }

        if ($object instanceof PostRepositoryAware) {
            if (!$this->postrepository) {
                $this->postrepository = new PostRepository();
                $this->manage($this->postrepository);
            }
            $object->setPostRepository($this->postrepository);
        }

        if ($object instanceof ImageRepositoryAware) {
            if (!$this->imagerepository) {
                $this->imagerepository = new ImageRepository();
                $this->manage($this->imagerepository);
            }
            $object->setImageRepository($this->imagerepository);
        }

        if ($object instanceof CategoryRepositoryAware) {
            if (!$this->categoryrepository) {
                $this->categoryrepository = new CategoryRepository();
                $this->manage($this->categoryrepository);
            }
            $object->setCategoryRepository($this->categoryrepository);
        }

        if ($object instanceof UserRepositoryAware) {
            if (!$this->userrepository) {
                $this->userrepository = new UserRepository();
                $this->manage($this->userrepository);
            }
            $object->setUserRepository($this->userrepository);
        }


        if ($object instanceof TwigAware) {
            if (!$this->twig) {
                $loader = new FilesystemLoader(__DIR__ . '/../Templates');
                $this->twig = new Environment($loader);
                $this->twig->addGlobal('request', $this->request);
            }
            $object->setTwig($this->twig);
        }
    }
}
