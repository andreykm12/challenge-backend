<?php

namespace App\Http\Controllers\Api;

use DB;
use Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PropertyRepository;
use App\Http\Requests\Api\PropertyRequest;

class PropertyController extends Controller
{
    private $PropertyRepository;

    public function __construct(
        PropertyRepository $PropertyRepository
    ) {
        $this->PropertyRepository = $PropertyRepository;
    }

    public function getAll()
    {
        return $this->PropertyRepository->getAll();
    }

    public function getById(int $propertyId)
    {
        return $this->model->getById($propertyId);
    }

    public function create(PropertyRequest $request)
    {
        DB::beginTransaction();

        $params = [
            'guid'    =>  $request->input('guid'),
            'suburb'  =>  $request->input('suburb'),
            'state'   =>  $request->input('state'),
            'country' =>  $request->input('country'),
        ];

        $Property = $this->PropertyRepository->create($params);

        if ( !$Property )
        {
            DB::rollBack();
            Log::error('Failed creating Property');

            return response('Failed creating Property', 400);
        }

        DB::commit();
        return response('Success', 201);
    }

    public function update(PropertyRequest $request, int $propertyId)
    {
        $params = [
            'guid'    =>  $request->input('guid'),
            'suburb'  =>  $request->input('suburb'),
            'state'   =>  $request->input('state'),
            'country' =>  $request->input('country'),
        ];

        $Property = $this->PropertyRepository->getById($propertyId);
        if( !$Property ){
            return response('Not found property', 401);
        }

        $Property = $this->PropertyRepository->update($params, $propertyId);

        if ( !$Property )
        {
            Log::error('Failed updating Property');
            return response('Failed updating Property', 400);
        }

        return response('Success', 200);
    }

    public function delete(int $propertyId)
    {
        $Property = $this->PropertyRepository->getById($propertyId);
        if( !$Property ){
            return response('Not found property', 401);
        }

        $Property = $this->PropertyRepository->delete($propertyId);

        if ( !$Property )
        {
            Log::error('Failed deleting Property');
            return response('Failed deleting Property', 400);
        }

        return response('Success', 200);
    }
}
