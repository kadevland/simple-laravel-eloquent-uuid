<?php

use Kadevland\Eloquent\Uuid\Generators\Uuid1Bytes;
use Kadevland\Eloquent\Uuid\Generators\Uuid1String;
use Kadevland\Eloquent\Uuid\Generators\Uuid4Bytes;
use Kadevland\Eloquent\Uuid\Generators\Uuid4String;

return [

    /*
    |--------------------------------------------------------------------------
    | Version
    |--------------------------------------------------------------------------
    | Write something down here
    */
    'version' => 'uuid4',

    /*
    |--------------------------------------------------------------------------
    | Versions
    |--------------------------------------------------------------------------
    | Write something down here
    */
    'versions' => [
        'uuid1' => [
            'string' => Uuid1String::class,
            'bytes' => Uuid1Bytes::class,
        ],
        'uuid4' => [
            'string' => Uuid4String::class,
            'bytes' => Uuid4Bytes::class,
        ],
    ],

];
