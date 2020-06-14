<?php

namespace App\Repositories;

use DB;
use App\Models\PropertyModel;
use Prettus\Repository\Eloquent\BaseRepository;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Prettus\Repository\Criteria\RequestCriteria;

class PropertyRepositoryEloquent extends BaseRepository implements PropertyRepository
{
    public function model()
    {
        return PropertyModel::class;
    }

    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getById(int $propertyId)
    {
        return $this->model->find($propertyId);
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $propertyId)
    {
        return $this->model->find($propertyId)->update($data);
    }

    public function getMaxValueByField(string $fieldProperty, $fieldValue) : float
    {
       $Model = $this->model
            ->where($fieldProperty, $fieldValue)
            ->withCount(['propertyAnalytic as value' => function($query){
                $query->select( DB::raw(' MAX(value)') );
            }])->first();

        if( empty($Model) ) {
            return 0;
        }

        return floatval($Model->value);
    }

    public function getAvgValueByField(string $fieldProperty, $fieldValue) : float
    {
        $Model = $this->model
            ->where($fieldProperty, $fieldValue)
            ->withCount(['propertyAnalytic as value' => function($query){
                $query->select( DB::raw(' AVG(value)') );
            }])->first();

        if( empty($Model) ) {
            return 0;
        }

        return floatval($Model->value);
    }

    public function getMinValueByField(string $fieldProperty, $fieldValue) : float
    {
        $Model = $this->model
            ->where($fieldProperty, $fieldValue)
            ->withCount(['propertyAnalytic as value' => function($query){
                $query->select( DB::raw(' MIN(value)') );
            }])->first();

        if( empty($Model) ) {
            return 0;
        }

        return floatval($Model->value);
    }
}
