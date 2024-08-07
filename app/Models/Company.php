<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'acronym',
        'slogan',
        'logo',
        'phone',
        'email',
        'web_site',
        'social_media',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'social_media' => 'array',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
