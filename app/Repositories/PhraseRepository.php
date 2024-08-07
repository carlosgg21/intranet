<?php

namespace App\Repositories;

use App\Models\Phrase;
use Illuminate\Database\Eloquent\Collection;

class PhraseRepository
{
	protected $phrase;


	public function __construct(Phrase $phrase) {
		$this->phrase = $phrase;
	
	}

	public function getAllPhrases(): Collection
    {
        return $this->phrase->with('phraseCategory')->get();
    }

	public function getRandomPhrase(): ?Phrase
    {	
        
		$query = $this->phrase->with('phraseCategory');

		$categoryId = setting('home.phrase');
		if ($categoryId != 0) {			
			$query->where('phrase_category_id', $categoryId);
		}

		return $query->inRandomOrder()->first();
    }

}