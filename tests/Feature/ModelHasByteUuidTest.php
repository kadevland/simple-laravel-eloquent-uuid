<?php

namespace Kadevland\Eloquent\Uuid\Tests\Feature;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use Kadevland\Eloquent\Uuid\Tests\TestCase;
use Kadevland\Eloquent\Uuid\Tests\Fixtures\Eloquent\Model\ModelHasByteUuid;


class ModelHasByteUuidTest extends TestCase
{



    /**
     * @test
     * @environment-setup useUuidV4
     */
    public function it_set_uuid_4_when_create_model()
    {

        $model =  ModelHasByteUuid::create(['title' => Str::random(30)]);

        $uuid = Uuid::fromBytes($model->id);

        $this->assertNotNull($model->id);
        $this->assertInstanceOf(Uuid::class, $uuid);
        $this->assertEquals(4, $uuid->getVersion());
    }

    /**
     * @test
     * @environment-setup useUuidV4
     */
    public function it_set_uuid_4_when_save_new_model()
    {

        $model =   new ModelHasByteUuid();

        $model->title = Str::random(30);

        $model->save();

        $uuid = Uuid::fromBytes($model->id);

        $this->assertNotNull($model->id);
        $this->assertInstanceOf(Uuid::class, $uuid);
        $this->assertEquals(4, $uuid->getVersion());
    }

    /**
     * @test
     * @environment-setup useUuidV4
     */
    public function it_does_not_override_the_uuid_4_if_it_is_already_set_when_create_model()
    {

        $uuid = Uuid::uuid4();
        $model =  ModelHasByteUuid::create(['id' => $uuid->getBytes(), 'title' => Str::random(30)]);

        $this->assertSame($uuid->getBytes(), $model->id);
    }


    /**
     * @test
     * @environment-setup useUuidV4
     */
    public function it_does_not_override_the_uuid_4_if_it_is_already_set_when_save_new_model()
    {

        $uuid = Uuid::uuid4();

        $model =   new ModelHasByteUuid();
        $model->id = $uuid->getBytes();
        $model->title = Str::random(30);
        $model->save();

        $this->assertSame($uuid->getBytes(), $model->id);
    }


    /**
     * @test
     * @environment-setup useUuidV1
     */
    public function it_set_uuid_1_when_create_model()
    {

        $model =  ModelHasByteUuid::create(['title' => Str::random(30)]);

        $uuid = Uuid::fromBytes($model->id);

        $this->assertNotNull($model->id);
        $this->assertInstanceOf(Uuid::class, $uuid);
        $this->assertEquals(1, $uuid->getVersion());
    }

    /**
     * @test
     * @environment-setup useUuidV1
     */
    public function it_set_uuid_1_when_save_new_model()
    {

        $model =   new ModelHasByteUuid();

        $model->title = Str::random(30);

        $model->save();

        $uuid = Uuid::fromBytes($model->id);

        $this->assertNotNull($model->id);
        $this->assertInstanceOf(Uuid::class, $uuid);
        $this->assertEquals(1, $uuid->getVersion());
    }

    /**
     * @test
     * @environment-setup useUuidV1
     */
    public function it_does_not_override_the_uuid_1_if_it_is_already_set_when_create_model()
    {

        $uuid = Uuid::uuid1();
        $model =  ModelHasByteUuid::create(['id' => $uuid->getBytes(), 'title' => Str::random(30)]);


        $this->assertSame($uuid->getBytes(), $model->id);
    }

    /**
     * @test
     * @environment-setup useUuidV1
     */
    public function it_does_not_override_the_uuid_1_if_it_is_already_set_when_save_new_model()
    {

        $uuid = Uuid::uuid1();

        $model =   new ModelHasByteUuid();
        $model->id = $uuid->getBytes();
        $model->title = Str::random(30);
        $model->save();

        $this->assertSame($uuid->getBytes(), $model->id);
    }
}
