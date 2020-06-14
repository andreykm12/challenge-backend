<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PropertyRepository.
 */
interface PropertyRepository extends RepositoryInterface
{
    public function model();

    public function boot();

    public function getById(int $propertyId);

    public function getAll();

    public function create(array $data);

    public function update(array $data, $propertyId);

    public function getMaxValueByField(string $fieldProperty, $fieldValue) : float;

    public function getAvgValueByField(string $fieldProperty, $fieldValue) : float;

    public function getMinValueByField(string $fieldProperty, $fieldValue) : float;
}
