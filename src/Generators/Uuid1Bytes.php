<?php

namespace Kadevland\Eloquent\Uuid\Generators;

use Kadevland\Eloquent\Uuid\Contracts\UuidGenerator;
use Ramsey\Uuid\Uuid;


class Uuid1Bytes implements UuidGenerator
{
    public function getUuid(): string
    {
        return Uuid::uuid1()->getBytes();
    }
}
