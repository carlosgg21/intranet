<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessFileStatus extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'process_file_statuses';

    public function processFiles()
    {
        return $this->hasMany(ProcessFile::class);
    }
}
