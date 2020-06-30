<?php

namespace Kadevland\Eloquent\Uuid\Tests\Unit;

use Ramsey\Uuid\Uuid;
use Kadevland\Eloquent\Uuid\Tests\TestCase;
use Kadevland\Eloquent\Uuid\Traits\HasByteUuid;

class HasByteUuidTest extends TestCase
{


    /**
     * @test
     * @environment-setup useUuidV4
     */
    public function check_generate_uuid_4_test()
    {

        $moke = $this->getMockForTrait(HasByteUuid::class);
        $uuid_bytes = $moke->generateUuid();
        $uuid = Uuid::fromBytes($uuid_bytes);

        $this->assertNotNull($uuid_bytes);
        $this->assertInstanceOf(Uuid::class, $uuid);
        $this->assertEquals(4, $uuid->getVersion());
    }

    /**
     * @test
     * @environment-setup useUuidV1
     */
    public function check_generate_uuid_1_test()
    {

        $moke = $this->getMockForTrait(HasByteUuid::class);
        $uuid_bytes = $moke->generateUuid();
        $uuid = Uuid::fromBytes($uuid_bytes);

        $this->assertNotNull($uuid_bytes);
        $this->assertInstanceOf(Uuid::class, $uuid);
        $this->assertEquals(1, $uuid->getVersion());
    }
}
