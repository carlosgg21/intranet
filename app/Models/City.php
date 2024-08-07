<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['name', 'acronym', 'country_id'];

    protected $searchableFields = ['*'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function townships()
    {
        return $this->hasMany(Township::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
