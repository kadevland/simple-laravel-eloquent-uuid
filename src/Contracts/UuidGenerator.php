<?php


namespace Kadevland\Eloquent\Uuid\Contracts;


interface UuidGenerator
{
    public function getUuid(): string;
}