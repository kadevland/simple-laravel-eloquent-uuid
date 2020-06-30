<?php

namespace Kadevland\Eloquent\Uuid\Tests\Feature;

use Illuminate\Support\Str;
use Kadevland\Eloquent\Uuid\Tests\TestCase;
use Kadevland\Eloquent\Uuid\Tests\Fixtures\Eloquent\Model\ModelHasUuidWithBigIncrements;

class ModelHasUuidWithBigIncrementsTest extends TestCase
{


    /**
     * @test
     * @environment-setup useUuidV4
     */
    public function it_not_set_uuid_4_when_create_model()
    {

        $model =  ModelHasUuidWithBigIncrements::create(['title' => Str::random(30)]);

        $this->assertIsInt($model->id);
    }


    /**
     * @test
     * @environment-setup useUuidV4
     */
    public function it_not_set_uuid_4_when_save_new_model()
    {

        $model =   new ModelHasUuidWithBigIncrements();

        $model->title = Str::random(30);

        $model->save();

        $this->assertIsInt($model->id);
    }





    /**
     * @test
     * @environment-setup useUuidV1
     */
    public function it_not_set_uuid_1_when_create_model()
    {

        $model =  ModelHasUuidWithBigIncrements::create(['title' => Str::random(30)]);

        $this->assertIsInt($model->id);
    }

    /**
     * @test
     * @environment-setup useUuidV1
     */
    public function it_not_set_uuid_1_when_save_new_model()
    {

        $model =   new ModelHasUuidWithBigIncrements();

        $model->title = Str::random(30);

        $model->save();

        $this->assertIsInt($model->id);
    }
}
