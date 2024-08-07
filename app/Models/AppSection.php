<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppSection extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['name', 'display_name', 'description'];

    protected $searchableFields = ['*'];

    protected $table = 'app_sections';

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
