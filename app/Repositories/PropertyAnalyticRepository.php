<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PropertyRepository.
 */
interface PropertyAnalyticRepository extends RepositoryInterface
{
    public function model();

    public function boot();

    public function getById(int $propertyAnalyticId);

    public function getAll();
}
