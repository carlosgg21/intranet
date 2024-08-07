<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Phrase extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['text', 'author', 'image', 'phrase_category_id'];

    protected $searchableFields = ['*'];

    public function phraseCategory()
    {
        return $this->belongsTo(PhraseCategory::class);
    }
}
