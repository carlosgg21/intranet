<?php

namespace App\Repositories;

use App\Models\Article;
use App\Models\AppSection;
use Illuminate\Database\Eloquent\Collection;

class ArticleRepository
{
	protected $article;


	public function __construct(Article $article) {
		$this->article = $article;
	}

	public function showArticlesBySectionName($sectionName)
	{
		// Encuentra la sección por nombre
		$section = AppSection::where('name', $sectionName)->first();

		// Si la sección no existe, retorna una colección vacía
		if (!$section) {
			return collect(); // Retorna una colección vacía si no se encuentra la sección
		}

		// Obtiene los artículos de la sección
		return $section->articles->first();  // Utiliza la relación definida
	}

}