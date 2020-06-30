<?php

namespace Kadevland\Eloquent\Uuid\Tests\Fixtures\Eloquent\Model;

use Kadevland\Eloquent\Uuid\Traits\HasByteUuid;
use Illuminate\Database\Eloquent\Model as BaseModel;

class ModelHasByteUuid extends BaseModel
{
    use HasByteUuid;

    protected $table = 'table_uuids';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $guarded = [];
}
