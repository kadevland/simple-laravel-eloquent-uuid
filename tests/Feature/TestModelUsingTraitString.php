<?php

namespace Kadevland\Eloquent\Uuid\Tests;


use Kadevland\Eloquent\Uuid\Tests\Models\ModelStringUuid;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;

class TestModelUsingTraitString extends \Orchestra\Testbench\TestCase
{

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }




    /** @test */
    public function it_set_uuid_when_create_model()
    {
        $model =  ModelStringUuid::create();

        $this->assertNotNull($model->id);
    }

    /** @test */
    public function is_valid_uuid_when_create_model()
    {
        $model =  ModelStringUuid::create();
        $this->assertTrue(Uuid::isValid($model->id));
    }



    /** @test */
    public function it_set_uuid_when_save_new_model()
    {
        $model =  new ModelStringUuid();
        $model->save();

        $this->assertTrue(Uuid::isValid($model->id));
    }


    /** @test */
    public function is_valid_uuid_when_save_new_model()
    {
        $model =  new ModelStringUuid();
        $model->save();

        $this->assertNotNull($model->id);
    }

    /** @test */
    public function it_does_not_override_the_uuid_if_it_is_already_set_when_create_model()
    {
        $uuid = (Uuid::uuid4())->toString();
        $model =  ModelStringUuid::create(['id' => $uuid]);
        $this->assertSame($uuid, $model->id);
    }

    /** @test */
    public function it_does_not_override_the_uuid_if_it_is_already_set_when_save_new_model()
    {
        $uuid = (Uuid::uuid4())->toString();
        $model =  new ModelStringUuid();
        $model->id = $uuid;
        $model->save();

        $this->assertSame($uuid, $model->id);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase(Application $app): void
    {
        $app['db']->connection()
            ->getSchemaBuilder()
            ->create('test_table_with_uuids', function (Blueprint $table): void {
                $table->uuid('id')->primary();
                $table->string('tag')->nullable();
                $table->timestamps();
            });
    }
}
