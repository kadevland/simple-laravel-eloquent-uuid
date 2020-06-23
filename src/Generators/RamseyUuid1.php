<?php

namespace Kadevland\Eloquent\Uuid\Generators;

use Kadevland\Eloquent\Uuid\Contracts\UuidGeneratorBytes;
use Kadevland\Eloquent\Uuid\Contracts\UuidGeneratorString;
use Ramsey\Uuid\Uuid;


class RamseyUuid1 implements UuidGeneratorString, UuidGeneratorBytes
{

    public function getUuidString(): string
    {
        return  Uuid::uuid1()->toString();
    }

    public function getUuidBytes(): string
    {
        return  Uuid::uuid1()->getBytes();
    }
}
