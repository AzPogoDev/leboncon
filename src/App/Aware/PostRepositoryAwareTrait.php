<?php


namespace App\Aware;


use App\Repository\PostRepository;

trait PostRepositoryAwareTrait
{
    private ?PostRepository $Postrepo = null;

    public function setPostRepository(PostRepository $Postrepository)
    {
        $this->Postrepo = $Postrepository;
    }

}