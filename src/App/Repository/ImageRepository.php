<?php


namespace App\Repository;

use App\Aware\PdoAware;
use App\Aware\PdoAwareTrait;

use App\Entity\Image;
use App\Entity\Post;
use PDO;


class ImageRepository implements PdoAware
{
    use PdoAwareTrait;


    public function getAllImg()
    {

        $query = $this->pdo->prepare('SELECT * FROM `img`');
        $query->execute();

        return $query->fetchAll();
    }


    public function getImageByPost(Post $post)
    {

        $query = $this->pdo->prepare('SELECT * FROM `img` WHERE postId = :pid');

        $query->execute(
            ['pid' => $post->getId()]
        );
        $images = [];

        while (($imageData = $query->fetch())) {
            $images[] = Image::createFromData($imageData);
        }

        return $images;
    }

    public function getImg(int $number)
    {

        $query = $this->pdo->prepare('SELECT * FROM `img` WHERE postId = :postid');

        $query->bindParam('postid', $number, PDO::PARAM_INT);

        $query->execute();

        return $query->fetch();
    }

    public function addImg(Image $img)
    {
        $query = $this->pdo->prepare('INSERT INTO `img`(`url`, `postId`) VALUES (:url , :postid)');

        $query->execute([
            'url' => $img->getUrl(),
            'postid' => $img->getPostId()
        ]);

        return $query->fetchAll();
    }

}