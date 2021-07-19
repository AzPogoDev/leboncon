<?php


namespace App\Aware;

use App\Repository\PostRepository;


interface PostRepositoryAware
{
    public function setPostRepository(PostRepository $postrepository);
}