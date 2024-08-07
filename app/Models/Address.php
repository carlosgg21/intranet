<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'address',
        'zip_code',
        'default',
        'township_id',
        'city_id',
        'country_id',
        'addressable_id',
        'addressable_type',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'default' => 'boolean',
    ];

    public function township()
    {
        return $this->belongsTo(Township::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function addressable()
    {
        return $this->morphTo();
    }
}