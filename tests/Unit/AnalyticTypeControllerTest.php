<?php

namespace Tests\Unit;

use Mockery;
use Tests\TestCase;
use Illuminate\Support\Arr;
use App\Models\AnalyticTypeModel;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\Api\AnalyticTypeRequest;
use App\Http\Controllers\Api\AnalyticTypeController;
use App\Repositories\AnalyticTypeRepositoryEloquent;

class AnalyticTypeControllerTest extends TestCase
{
    private $AnalyticTypeRepository;

    private $AnalyticTypeController;

    public function setUp(): void
    {
        parent::setUp();
        putenv('APP_ENV=testing');

        $this->AnalyticTypeRepository = new AnalyticTypeRepositoryEloquent(app());
    }

    public function tearDown(): void
    {
        parent::tearDown();
    }

    public function assembleControllerDependencies(): void
    {
    }

    public function manifestAnalyticTypeController()
    {
        $this->AnalyticTypeController = new AnalyticTypeController(
            $this->AnalyticTypeRepository
        );
    }

     /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function canGetAll()
    {
        $this->assembleControllerDependencies();
        $this->manifestAnalyticTypeController();

        $testAnalyticType = factory(AnalyticTypeModel::class, 10)->create();

        $AnalyticTypeAll =  $this->AnalyticTypeRepository->getAll();

        $this->assertNotNull($AnalyticTypeAll);
        $this->assertNotNull($testAnalyticType);
        $this->assertEquals(10, sizeof($AnalyticTypeAll));
    }

    /** @test */
    public function canGetById()
    {
        $this->assembleControllerDependencies();
        $this->manifestAnalyticTypeController();

        $NewAnalyticType = factory(AnalyticTypeModel::class)->create();

        $AnalyticType =  $this->AnalyticTypeRepository->getById($NewAnalyticType->id);

        $this->assertNotNull($NewAnalyticType);
        $this->assertNotNull($AnalyticType);
        $this->assertEquals($NewAnalyticType->id, $AnalyticType->id);
    }

    /** @test */
    public function canCreate()
    {
        $this->assembleControllerDependencies();
        $this->manifestAnalyticTypeController();

        $newAnalyticTypeData = [
            'name'              => 'test',
            'units'             => 'test',
            'is_numeric'        => 0,
            'num_decimal_place' => 'test',
        ];

        $AnalyticType = $this->AnalyticTypeRepository->create($newAnalyticTypeData);

        $this->assertNotNull($AnalyticType);
    }

    /** @test */
    public function canUpdate()
    {
        $this->assembleControllerDependencies();
        $this->manifestAnalyticTypeController();

        $NewAnalyticType = factory(AnalyticTypeModel::class)->create();
        $NewAnalyticTypeId = $NewAnalyticType->id;

        $newAnalyticTypeData = [
            'name'              => 'test',
            'units'             => 'test',
            'is_numeric'        => 0,
            'num_decimal_place' => 'test',
        ];

        $response = $this->put("/api/analytic-type/$NewAnalyticTypeId", $newAnalyticTypeData);
        $response->assertStatus(200);
    }

    /** @test */
    public function canDelete()
    {
        $this->assembleControllerDependencies();
        $this->manifestAnalyticTypeController();

        $NewAnalyticType = factory(AnalyticTypeModel::class)->create();
        $NewAnalyticTypeId = $NewAnalyticType->id;

        $newAnalyticTypeData = [
            'name'              => 'test',
            'units'             => 'test',
            'is_numeric'        => 0,
            'num_decimal_place' => 'test',
        ];

        $response = $this->delete("/api/analytic-type/$NewAnalyticTypeId", $newAnalyticTypeData);
        $response->assertStatus(200);
    }
}
