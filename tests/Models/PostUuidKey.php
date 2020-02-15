<?php

namespace Astrotomic\LaravelEloquentUuid\Tests\Models;

use Astrotomic\LaravelEloquentUuid\Eloquent\Concerns\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class PostUuidKey extends PostUuidAttribute
{
    public $incrementing = false;

    protected $keyType = 'string';

    protected $primaryKey = 'uuid';

    public function getUuidName(): string
    {
        return $this->getKeyName();
    }
}