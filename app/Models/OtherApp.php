<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherApp extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'display_name',
        'url',
        'icon',
        'image',
        'description',
        'type',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'other_apps';
}
