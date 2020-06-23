<?php

namespace Kadevland\Eloquent\Uuid\Traits;

trait HasByteUuid
{
    use HandlesUuid;

    public function resolveUuidClass(): string
    {
        return config(
            sprintf("eloquent-uuid.versions.%s.bytes", config('eloquent-uuid.version'))
        );
    }
}
