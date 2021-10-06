<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class FavoritesComposer extends Composer
{
	protected static $views = [
		'template-favorites',
	];

	public function with(): array
	{
		return [
			'product_ids' => $this->getProductIds(),
		];
	}

	private function getProductIds(): array
	{
		$cookie = $_COOKIE['favs'];

		if (!$cookie) {
			return [];
		}

		return json_decode($cookie);
	}
}
