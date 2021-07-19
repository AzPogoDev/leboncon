<?php


namespace App\Aware;

use App\Repository\ImageRepository;


interface ImageRepositoryAware
{
    public function setImageRepository(ImageRepository $Imagerepository);
}