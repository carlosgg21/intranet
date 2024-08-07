<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkGroup extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'work_groups';

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }
}
