<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProcessFile extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'code',
        'title',
        'description',
        'created_date',
        'created_by',
        'reviewed_by',
        'appoved_by',
        'approval_date',
        'file',
        'process_id',
        'process_file_status_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'process_files';

    protected $casts = [
        'created_date'  => 'date',
        'approval_date' => 'date',
    ];

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function processFileStatus()
    {
        return $this->belongsTo(ProcessFileStatus::class);
    }
}
