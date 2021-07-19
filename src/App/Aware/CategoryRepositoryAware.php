<?php


namespace App\Aware;

use App\Repository\CategoryRepository;


interface CategoryRepositoryAware
{
    public function setCategoryRepository(CategoryRepository $Categoryrepository);
}