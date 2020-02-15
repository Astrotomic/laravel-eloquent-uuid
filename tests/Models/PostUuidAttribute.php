<?php

namespace Astrotomic\LaravelEloquentUuid\Tests\Models;

use Astrotomic\LaravelEloquentUuid\Eloquent\Concerns\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class PostUuidAttribute extends Model
{
    use UsesUUID;

    protected $table = 'posts';

    protected $guarded = [];
}
