<?php

namespace App\Repositories;

use App\Models\AnalyticTypeModel;
use Prettus\Repository\Eloquent\BaseRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Prettus\Repository\Criteria\RequestCriteria;

class AnalyticTypeRepositoryEloquent extends BaseRepository implements AnalyticTypeRepository
{
    public function model()
    {
        return AnalyticTypeModel::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getById(int $analyticTypeId)
    {
        return $this->model->find($analyticTypeId);
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $analyticTypeId)
    {
        return $this->model->find($analyticTypeId)->update($data);
    }
}
