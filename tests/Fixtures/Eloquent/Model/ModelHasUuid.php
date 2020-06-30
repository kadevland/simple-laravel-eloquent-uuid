<?php

namespace Kadevland\Eloquent\Uuid\Tests\Fixtures\Eloquent\Model;

use Kadevland\Eloquent\Uuid\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model as BaseModel;

class ModelHasUuid extends BaseModel
{
    use HasUuid;

    protected $table = 'table_uuids';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $guarded = [];
}
