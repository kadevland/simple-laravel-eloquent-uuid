<?php

namespace Kadevland\Eloquent\Uuid\Traits;

use Kadevland\Eloquent\Uuid\Contracts\UuidGeneratorBytes;
use Kadevland\Eloquent\Uuid\Generators\RamseyUuid1;
use Kadevland\Eloquent\Uuid\Generators\RamseyUuid4;

trait HasUuidBytes
{


    /**
     *
     * @return void
     */

    public static function bootHasUuidBytes(): void
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
        return ($this->resolveUuidGenerator())->getUuidBytes();
    }

    /**
     * @return UuidGeneratorBytes
     */
    protected function resolveUuidGenerator(): UuidGeneratorBytes
    {

        $generator = config('model-uuid.uuid.' . config('model-uuid.uuid.uuid_generator') . '.bytes');

        if (\class_exists($generator)) {

            return new $generator();
        }

        return new \Kadevland\Eloquent\Uuid\Generators\RamseyUuid4();
    }
}
