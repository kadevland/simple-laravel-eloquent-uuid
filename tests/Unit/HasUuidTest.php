<?php

namespace Kadevland\Eloquent\Uuid\Tests\Unit;

use Ramsey\Uuid\Uuid;
use Kadevland\Eloquent\Uuid\Tests\TestCase;
use Kadevland\Eloquent\Uuid\Traits\HasUuid;

class HasUuidTest extends TestCase
{


    /**
     * @test
     * @environment-setup useUuidV4
     */
    public function check_generate_uuid_4_test()
    {


        $this->app['config']->set('eloquent-uuid.version', 'uuid4');

        $moke = $this->getMockForTrait(HasUuid::class);
        $uuid_string = $moke->generateUuid();
        $uuid = Uuid::fromString($uuid_string);

        $this->assertNotNull($uuid_string);
        $this->assertInstanceOf(Uuid::class, $uuid);
        $this->assertEquals(4, $uuid->getVersion());
    }

    /**
     * @test
     * @environment-setup useUuidV1
     */
    public function check_generate_uuid_1_test()
    {



        $moke = $this->getMockForTrait(HasUuid::class);
        $uuid_string = $moke->generateUuid();
        $uuid = Uuid::fromString($uuid_string);

        $this->assertNotNull($uuid_string);
        $this->assertInstanceOf(Uuid::class, $uuid);
        $this->assertEquals(1, $uuid->getVersion());
    }
}
