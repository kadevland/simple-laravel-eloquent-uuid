<?php

namespace Kadevland\Eloquent\Uuid\Tests\Models;

use Kadevland\Eloquent\Uuid\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model as BaseModel;

class ModelStringUuid extends BaseModel
{
    use HasUuid;

    protected $table = 'test_table_with_uuids';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = ['id'];
}
