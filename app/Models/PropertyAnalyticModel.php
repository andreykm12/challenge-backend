<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyAnalyticModel extends Model
{
    protected $table = 'property_analytics';

    protected $fillable = [
        'property_id', 'analytic_type_id', 'value',
    ];
    protected $hidden = [];

    public function analyticType()
    {
        return $this->belongsTo(AnalyticTypeModel::class, 'analytic_type_id', 'id');
    }

    public function property()
    {
        return $this->belongsTo(PropertyModel::class, 'property_id', 'id');
    }
}
