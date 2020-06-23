<?php

namespace Kadevland\Eloquent\Uuid\Generators;

use Kadevland\Eloquent\Uuid\Contracts\UuidGenerator;
use Ramsey\Uuid\Uuid;


class Uuid4String implements UuidGenerator
{
    public function getUuid(): string
    {
        return Uuid::uuid4()->toString();
    }
}
