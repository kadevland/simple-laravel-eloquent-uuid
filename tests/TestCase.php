<?php

namespace Kadevland\Eloquent\Uuid\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Database\Schema\Blueprint;
use Kadevland\Eloquent\Uuid\UuidServiceProvider;

class TestCase  extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    protected function getPackageProviders($app)
    {

        return [
            UuidServiceProvider::class,
        ];
    }


    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase(Application $app): void
    {
        $app['db']->connection()
            ->getSchemaBuilder()
            ->create('table_uuids', function (Blueprint $table): void {
                $table->uuid('id')->primary();
                $table->string('title')->nullable();
                $table->timestamps();
            });


        $app['db']->connection()
            ->getSchemaBuilder()
            ->create('table_increments', function (Blueprint $table): void {
                $table->bigIncrements('id');
                $table->string('title')->nullable();
                $table->timestamps();
            });
    }


    protected function useUuidV1($app)
    {
        $app['config']->set('eloquent-uuid.version', 'uuid1');
    }

    protected function useUuidV4($app)
    {
        $app['config']->set('eloquent-uuid.version', 'uuid4');
    }
}
