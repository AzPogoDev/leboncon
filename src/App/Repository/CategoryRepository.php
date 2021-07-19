<?php


namespace App\Repository;

use App\Aware\PdoAware;
use App\Aware\PdoAwareTrait;

use App\Entity\Category;
use App\Entity\Post;

class CategoryRepository implements PdoAware
{
    use PdoAwareTrait;

    public function getAllCat()
    {

        $query = $this->pdo->prepare('SELECT * FROM `category`');
        $query->execute();

        return $query->fetchAll();
    }

    public function getCategoryByPost(Post $post)
    {

        $query = $this->pdo->prepare('SELECT * FROM `category` WHERE postId = :pid');

        $query->execute(
            ['pid' => $post->getId()]
        );
        $Categorys = [];

        while (($CategoryData = $query->fetch())) {
            $Categorys[] = Category::createFromData($CategoryData);
        }

        return $Categorys;
    }

    public function addCat(Category $cat)
    {
        $query = $this->pdo->prepare('INSERT INTO `category`(`name`, `postId`) VALUES (:name , :postid)');

        $query->execute([
            'name' => $cat->getName(),
            'postid' => $cat->getPostId()
        ]);

        return $query->fetchAll();
    }

    public function getCat(int $number)
    {

        $query = $this->pdo->prepare('SELECT * FROM `category` WHERE postId = :postid');

        $query->bindParam('postid', $number, PDO::PARAM_INT);

        $query->execute();

        return $query->fetch();
    }
}