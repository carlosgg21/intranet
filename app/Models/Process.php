<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'description',
        'process_type_id',
        'parent_id',
    ];

    protected $searchableFields = ['*'];

    public function processType()
    {
        return $this->belongsTo(ProcessType::class);
    }

    public function processFiles()
    {
        return $this->hasMany(ProcessFile::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }
}
