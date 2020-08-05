<?php

namespace Astrotomic\LaravelEloquentUuid\Eloquent\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @method static Builder whereUuid(string|string[] $uuid)
 * @method static Builder byUuid(string|string[] $uuid)
 *
 * @mixin Model
 */
trait UsesUUID
{
    public static function bootUsesUUID(): void
    {
        self::creating(static function (Model $model): void {
            /** @var Model|UsesUUID $model */
            if ($model->isValidUuid($model->getUuid())) {
                return;
            }

            $model->setUuid(static::generateUniqueUuid());
        });
    }

    public static function generateUniqueUuid(): string
    {
        do {
            $uuid = static::generateUuid()->toString();
        } while (static::byUuid($uuid)->exists());

        return $uuid;
    }

    public static function generateUuid(): UuidInterface
    {
        return Uuid::uuid4();
    }

    /**
     * @param Builder $query
     * @param string|string[]|UuidInterface|UuidInterface[] $uuid
     *
     * @return Builder
     */
    public function scopeWhereUuid(Builder $query, $uuid): Builder
    {
        if (is_string($uuid) || $uuid instanceof UuidInterface) {
            return $query->where($this->getQualifiedUuidName(), '=', strval($uuid));
        } elseif (is_array($uuid)) {
            return $query->whereIn($this->getQualifiedUuidName(), array_map('strval', $uuid));
        }

        throw new InvalidArgumentException('The UUID has to be of type string, array or null.');
    }

    /**
     * @param Builder $query
     * @param string|string[]|UuidInterface|UuidInterface[] $uuid
     *
     * @return Builder
     */
    public function scopeByUuid(Builder $query, $uuid): Builder
    {
        return $this->scopeWhereUuid($query, $uuid);
    }

    /**
     * @param string|UuidInterface $uuid
     *
     * @return Model
     */
    public function setUuid($uuid): Model
    {
        if (! $this->isValidUuid($uuid)) {
            throw new InvalidArgumentException('The UUID has to be a valid UUID.');
        }

        return $this->setAttribute($this->getUuidName(), strval($uuid));
    }

    public function getUuid(): ?string
    {
        return $this->getAttribute($this->getUuidName());
    }

    /**
     * @param string|UuidInterface $uuid
     *
     * @return bool
     */
    public function isValidUuid($uuid): bool
    {
        if (is_string($uuid) || $uuid instanceof UuidInterface) {
            return Uuid::isValid(strval($uuid));
        }

        return false;
    }

    public function getQualifiedUuidName(): string
    {
        return $this->qualifyColumn($this->getUuidName());
    }

    public function getUuidName(): string
    {
        return $this->uuidName ?? 'uuid';
    }
}
