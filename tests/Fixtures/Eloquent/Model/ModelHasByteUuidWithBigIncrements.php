<?php

namespace Kadevland\Eloquent\Uuid\Tests\Fixtures\Eloquent\Model;

use Kadevland\Eloquent\Uuid\Traits\HasByteUuid;
use Illuminate\Database\Eloquent\Model as BaseModel;

class ModelHasByteUuidWithBigIncrements extends BaseModel
{
    use HasByteUuid;

    protected $table = 'table_increments';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $guarded = [];
}
