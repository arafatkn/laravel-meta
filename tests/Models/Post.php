<?php

namespace Arafatkn\LaravelMeta\Tests\Models;

use Arafatkn\LaravelMeta\Traits\Metable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Metable;
}
