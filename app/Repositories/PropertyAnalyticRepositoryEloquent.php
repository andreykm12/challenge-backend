<?php

namespace App\Repositories;

use App\Models\PropertyAnalyticModel;
use Prettus\Repository\Eloquent\BaseRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Prettus\Repository\Criteria\RequestCriteria;

class PropertyAnalyticRepositoryEloquent extends BaseRepository implements PropertyAnalyticRepository
{
    private $RoleRepository;

    public function model()
    {
        return PropertyAnalyticModel::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getById(int $propertyAnalyticId)
    {
        return $this->model->with(['property', 'analyticType'])->find($propertyAnalyticId);
    }

    public function getAll()
    {
        return $this->model->with(['property', 'analyticType'])->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $propertyAnalyticId)
    {
        return $this->model->find($propertyAnalyticId)->update($data);
    }
}
