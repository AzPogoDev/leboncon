<?php


namespace App\Aware;


use App\Repository\CategoryRepository;

trait CategoryRepositoryAwareTrait
{
    private ?CategoryRepository $Categoryrepo = null;

    public function setCategoryRepository(CategoryRepository $Categoryrepository)
    {
        $this->Categoryrepo = $Categoryrepository;
    }

}