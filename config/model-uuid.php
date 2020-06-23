<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Model Uuid config
    |--------------------------------------------------------------------------
    |
    | uuid_generator define class generator UUID to use
    |
    |
    | ramsey => use ramsey/uuid package
    | 
    | for your custom => need to implements UuidGenerator ( Kadevland\Eloquent\Uuid\Contracts );
    */

    'uuid_generator' => 'ramsey-uuid4',

    'ramsey-uuid1' => [
        'string' => 'Kadevland\Eloquent\Uuid\Generators\RamseyUuid1',
        'bytes'  => 'Kadevland\Eloquent\Uuid\Generators\RamseyUuid1',
    ],

    'ramsey-uuid4' => [
        'string' => 'Kadevland\Eloquent\Uuid\Generators\RamseyUuid4',
        'bytes'  => 'Kadevland\Eloquent\Uuid\Generators\RamseyUuid4',
    ],


];
