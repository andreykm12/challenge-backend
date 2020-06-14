<?php

namespace App\Http\Controllers\Api;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PropertyRepository;
use App\Repositories\AnalyticTypeRepository;
use App\Repositories\PropertyAnalyticRepository;
use App\Http\Requests\Api\PropertyAnalyticRequest;

class PropertyAnalyticController extends Controller
{
    private $PropertyRepository;
    private $AnalyticTypeRepository;
    private $PropertyAnalyticRepository;

    public function __construct(
        PropertyRepository $PropertyRepository,
        PropertyRepository $AnalyticTypeRepository,
        PropertyAnalyticRepository $PropertyAnalyticRepository
    ) {
        $this->PropertyRepository = $PropertyRepository;
        $this->AnalyticTypeRepository = $AnalyticTypeRepository;
        $this->PropertyAnalyticRepository = $PropertyAnalyticRepository;
    }

    public function getAll()
    {
        return $this->PropertyAnalyticRepository->getAll();
    }

    public function getById($propertyAnalyticId)
    {
        return $this->PropertyAnalyticRepository->getById($propertyAnalyticId);
    }

    public function getSummaryByField($fieldProperty, $fieldValue)
    {
        if( array_search($fieldProperty, ['suburb', 'state', 'country']) === false ){
            return response('field property incorrect', 400);
        }

        $result = [
            'max'    => $this->PropertyRepository->getMaxValueByField($fieldProperty, $fieldValue),
            'min'    => $this->PropertyRepository->getMinValueByField($fieldProperty, $fieldValue),
            'median' => $this->PropertyRepository->getAvgValueByField($fieldProperty, $fieldValue),
        ];

        return response($result);
    }

    public function create(PropertyAnalyticRequest $request)
    {
        if( !$this->PropertyRepository->getById( $request->input('property_id') ) ){
            return response('Not found property', 400);
        }

        if( !$this->AnalyticTypeRepository->getById( $request->input('analytic_type_id') ) ){
            return response('Not found analytic type', 400);
        }

        $params = [
            'value'            => $request->input('value'),
            'property_id'      => $request->input('property_id'),
            'analytic_type_id' => $request->input('analytic_type_id'),
        ];

        DB::beginTransaction();

        $PropertyAnalytic = $this->PropertyAnalyticRepository->create($params);

        if ( !$PropertyAnalytic )
        {
            DB::rollBack();
            Log::error('Failed creating Property Analytic');

            return response('Failed creating Property Analytic', 400);
        }

        DB::commit();
        return response('Success', 201);
    }
}
