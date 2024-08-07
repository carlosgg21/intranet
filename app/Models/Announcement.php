<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'text',
        'image',
        'document',
        'created_by',
        'ad_type_id',
    ];

    protected $searchableFields = ['*'];

    public function adType()
    {
        return $this->belongsTo(AdType::class);
    }
}
