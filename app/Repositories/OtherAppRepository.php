<?php

namespace App\Repositories;

use App\Models\OtherApp;
use Illuminate\Database\Eloquent\Collection;

class OtherAppRepository
{
	protected $otherApp;


	public function __construct(OtherApp $otherApp) {
		$this->otherApp = $otherApp;
	}

	public function getAllOtherApps(): Collection
	{
		return $this->otherApp->get();
	}

}