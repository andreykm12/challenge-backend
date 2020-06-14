<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalyticTypeModel extends Model
{
    protected $table = 'analytic_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'units', 'is_numeric', 'num_decimal_place',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function propertyAnalytic()
    {
        return $this->hasMany(PropertyAnalyticModel::class, 'id', 'analytic_type_id');
    }
}
