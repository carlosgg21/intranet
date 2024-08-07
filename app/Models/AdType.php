<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdType extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'icon'];

    protected $searchableFields = ['*'];

    protected $table = 'ad_types';

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }
}
