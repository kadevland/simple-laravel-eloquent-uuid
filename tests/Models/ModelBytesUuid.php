<?php

namespace Kadevland\Eloquent\Uuid\Tests\Models;

use Kadevland\Eloquent\Uuid\Traits\HasUuidBytes;
use Illuminate\Database\Eloquent\Model as BaseModel;

class ModelBytesUuid extends BaseModel
{
    use HasUuidBytes;

    protected $table = 'test_table_with_uuids';

    protected $keyType = 'uuid';

    public $incrementing = false;

    protected $fillable = ['id'];
}
