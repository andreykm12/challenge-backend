<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AnalyticTypeRepository;
use App\Http\Requests\Api\AnalyticTypeRequest;

class AnalyticTypeController extends Controller
{
    private $AnalyticTypeRepository;

    public function __construct(
        AnalyticTypeRepository $AnalyticTypeRepository
    ) {
        $this->AnalyticTypeRepository = $AnalyticTypeRepository;
    }

    public function getAll()
    {
        return $this->AnalyticTypeRepository->getAll();
    }

    public function getById(int $propertyId)
    {
        return $this->AnalyticTypeRepository->getById($propertyId);
    }

    public function create(AnalyticTypeRequest $request)
    {
        DB::beginTransaction();

        $params = [
            'name'              => $request->input('name'),
            'units'             => $request->input('units'),
            'is_numeric'        => $request->input('is_numeric'),
            'num_decimal_place' => $request->input('num_decimal_place'),
        ];

        $AnalyticType = $this->AnalyticTypeRepository->create($params);

        if ( !$AnalyticType )
        {
            DB::rollBack();
            Log::error('Failed creating AnalyticType');

            return response('Failed creating AnalyticType', 400);
        }

        DB::commit();
        return response('Success', 201);
    }

    public function update(AnalyticTypeRequest $request, int $analyticTypeId)
    {
        $params = [
            'name'              => $request->input('name'),
            'units'             => $request->input('units'),
            'is_numeric'        => $request->input('is_numeric'),
            'num_decimal_place' => $request->input('num_decimal_place'),
        ];

        $AnalyticType = $this->AnalyticTypeRepository->getById($analyticTypeId);
        if( !$AnalyticType ){
            return response('Not found property', 401);
        }

        $AnalyticType = $this->AnalyticTypeRepository->update($params, $analyticTypeId);

        if ( !$AnalyticType )
        {
            Log::error('Failed updating AnalyticType');
            return response('Failed updating AnalyticType', 400);
        }

        return response('Success', 200);
    }

    public function delete(int $analyticTypeId)
    {
        $AnalyticType = $this->AnalyticTypeRepository->getById($analyticTypeId);
        if( !$AnalyticType ){
            return response('Not found AnalyticType', 401);
        }

        $AnalyticType = $this->AnalyticTypeRepository->delete($analyticTypeId);

        if ( !$AnalyticType )
        {
            Log::error('Failed deleting AnalyticType');
            return response('Failed deleting AnalyticType', 400);
        }

        return response('Success', 200);
    }
}
