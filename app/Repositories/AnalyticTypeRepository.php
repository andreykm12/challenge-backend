<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AnalyticTypeRepository.
 */
interface AnalyticTypeRepository extends RepositoryInterface
{
    public function model();

    public function boot();

    public function getById(int $analyticTypeId);

    public function getAll();

    public function create(array $data);

    public function update(array $data, $analyticTypeId);
}
