<?php


namespace App\Repository;

use App\Aware\CategoryRepositoryAware;
use App\Aware\CategoryRepositoryAwareTrait;

use App\Aware\PdoAware;
use App\Aware\PdoAwareTrait;

use App\Aware\ImageRepositoryAware;
use App\Aware\ImageRepositoryAwareTrait;

use App\Entity\Post;
use PDO;


class PostRepository implements PdoAware, ImageRepositoryAware, CategoryRepositoryAware
{
    use PdoAwareTrait;
    use ImageRepositoryAwareTrait;
    use CategoryRepositoryAwareTrait;

    public function getAll()
    {
        $query = $this->pdo->prepare('SELECT * FROM `post`');
        $query->execute();
        $posts = [];

        while (($postDada = $query->fetch())) {
            $post = Post::createFromData($postDada);
            $post->setImages($this->Imagerepo->getImageByPost($post));
            $post->setCategory($this->Categoryrepo->getCategoryByPost($post));
            $posts[] = $post;
        }
        return $posts;
    }


    public function getById(int $number)
    {

        $query = $this->pdo->prepare('SELECT * FROM `post` WHERE id = :id');
        $query->bindParam('id', $number, PDO::PARAM_INT);
        $query->execute();
        $data = $query->fetch();

        $post = Post::createFromData($data);
        $post->setImages($this->Imagerepo->getImageByPost($post));
        $post->setCategory($this->Categoryrepo->getCategoryByPost($post));

        return $post;


    }


    public function addPost(Post $post)
    {
        $query = $this->pdo->prepare('INSERT INTO `post`( `title`, `price`, `place`, `content`) VALUES (:title, :price, :place, :content)');

        $query->execute([
            'title' => $post->getTitle(),
            'price' => $post->getPrice(),
            'place' => $post->getPlace(),
            'content' => $post->getContent(),
        ]);

        $post->setId($this->pdo->lastInsertId());

        return $post;
    }

}