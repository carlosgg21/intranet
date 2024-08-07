<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    protected $searchableFields = ['*'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }
}
