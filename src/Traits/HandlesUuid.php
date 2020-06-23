<?php


namespace Kadevland\Eloquent\Uuid\Traits;


use Kadevland\Eloquent\Uuid\Contracts\UuidGenerator;
use Kadevland\Eloquent\Uuid\Contracts\UuidGeneratorBytes;
use Kadevland\Eloquent\Uuid\Generators\Uuid1String;

trait HandlesUuid
{
    public static function bootHasUuidBytes(): void
    {
        static::creating(static function (HandlesUuid $model) {
            $model->generateUuidPrimaryKey();
        });

        static::saving(static function (HandlesUuid $model) {
            $model->generateUuidPrimaryKey();
        });
    }

    protected function generateUuidPrimaryKey(): void
    {
        if ($this->needUuidPrimaryKey()) {
            $this->{$this->getKeyName()} = $this->generateUuid();
        }
    }

    /**
     * @return bool
     */
    protected function needUuidPrimaryKey(): bool
    {
        return in_array($this->getKeyType(), ['uuid', 'string'])
            && !$this->getIncrementing()
            && empty($this->{$this->getKeyName()});
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