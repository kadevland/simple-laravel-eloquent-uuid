<?php

namespace Kadevland\Eloquent\Uuid\Contracts;

interface UuidGeneratorBytes
{
    public function getUuidBytes(): string;
}
