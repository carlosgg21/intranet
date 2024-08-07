<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'date',
        'hour',
        'place',
        'description',
        'created_by',
        'participants',
        'all_day',
        'repeat',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'date'         => 'date',
        'participants' => 'array',
        'all_day'      => 'boolean',
    ];
}
