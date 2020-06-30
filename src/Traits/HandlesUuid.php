<?php


namespace Kadevland\Eloquent\Uuid\Traits;


use Kadevland\Eloquent\Uuid\Contracts\UuidGenerator;
use Kadevland\Eloquent\Uuid\Generators\Uuid1String;

trait HandlesUuid
{
    /**
     * 
     * @return void 
     */
    public static function bootHandlesUuid(): void
    {
        static::creating(static function ($model) {

            static::generateUuidPrimaryKeyIfNeed($model);
        });

        static::saving(static function ($model) {

            static::generateUuidPrimaryKeyIfNeed($model);
        });
    }

    /**
     * 
     * @param mixed $model 
     * @return bool 
     */
    protected static function isFilledPrimaryKey($model): bool
    {

        return isset($model->attributes[$model->getKeyName()]) && !is_null($model->attributes[$model->getKeyName()]);
    }

    /**
     * 
     * @param mixed $model 
     * @return void 
     */
    protected static function generateUuidPrimaryKeyIfNeed($model): void
    {
        if (static::needUuidPrimaryKey($model) && !static::isFilledPrimaryKey($model)) {
            static::setUuidPrimaryKey($model);
        }
    }

    /**
     * 
     * @param mixed $model 
     * @return void 
     */
    protected static function setUuidPrimaryKey($model): void
    {
        $model->{$model->getKeyName()} = $model->generateUuid();
    }

    /**
     * @return bool
     */
    protected static function needUuidPrimaryKey($model): bool
    {

        return in_array($model->getKeyType(), ['uuid', 'string']) && !$model->getIncrementing();
    }

    /**
     *
     * @return string
     */
    public function generateUuid(): string
    {
        return $this->resolveUuidGenerator()->getUuid();
    }

    /**
     * @return UuidGenerator
     */
    protected function resolveUuidGenerator(): UuidGenerator
    {
        return class_exists($generator = $this->resolveUuidClass())
            ? app($generator)
            : new Uuid1String();
    }
}
