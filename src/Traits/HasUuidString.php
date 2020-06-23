<?php

namespace Kadevland\Eloquent\Uuid\Traits;

use Kadevland\Eloquent\Uuid\Contracts\UuidGeneratorString;
use Kadevland\Eloquent\Uuid\Generators\RamseyUuid4;


trait HasUuidString
{


    /**
     *
     * @return void
     */

    public static function bootHasUuidString(): void
    {


        static::creating(function ($model) {

            $model->generateUuidPrimaryKey();
        });

        static::saving(function ($model) {
            $model->generateUuidPrimaryKey();
        });
    }

    /**
     *
     * @param mixed $model
     * @return bool
     */
    protected function needUuidPrimaryKey()
    {

        return in_array($this->getKeyType(), ['uuid', 'string'])
            && !$this->getIncrementing()
            && empty($this->{$this->getKeyName()});
    }

    /**
     *
     * @param mixed $instance
     * @return void
     */
    protected function generateUuidPrimaryKey()
    {
       
        if ($this->needUuidPrimaryKey()) {
            $this->{$this->getKeyName()} = $this->generateUuid();
        }
    }

    /**
     *
     * @return string
     */
    public function generateUuid(): string
    {
        return ($this->resolveUuidGenerator())->getUuidString();
    }


    /**
     * @return UuidGeneratorString
     */
    protected function resolveUuidGenerator(): UuidGeneratorString
    {
        $generator = config('model-uuid.uuid.' . config('model-uuid.uuid.uuid_generator') . '.string');

        if (\class_exists($generator)) {

            return new $generator();
        }

        return new \Kadevland\Eloquent\Uuid\Generators\RamseyUuid4();
    }
}
