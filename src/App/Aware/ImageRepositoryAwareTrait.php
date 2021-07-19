<?php


namespace App\Aware;


use App\Repository\ImageRepository;

trait ImageRepositoryAwareTrait
{
    private ?ImageRepository $Imagerepo = null;

    public function setImageRepository(ImageRepository $Imagerepository)
    {
        $this->Imagerepo = $Imagerepository;
    }

}