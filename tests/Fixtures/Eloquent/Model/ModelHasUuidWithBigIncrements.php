<?php

namespace Kadevland\Eloquent\Uuid\Tests\Fixtures\Eloquent\Model;

use Kadevland\Eloquent\Uuid\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model as BaseModel;

class ModelHasUuidWithBigIncrements extends BaseModel
{
    use HasUuid;

    protected $table = 'table_increments';

    protected $keyType = 'int';

    public $incrementing = true;

    protected $guarded = [];
}
