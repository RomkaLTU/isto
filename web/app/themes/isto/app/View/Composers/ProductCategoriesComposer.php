<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class ProductCategoriesComposer extends Composer
{
	protected static $views = [
		'template-product-categories',
	];

	public function with(): array
	{
		return [
			'categories' => $this->categories()
		];
	}

	public function categories(): array
	{
		return get_categories([
			'taxonomy' => 'product_cat',
			'hide_empty' => false,
			'exclude' => [31, 32],
		]);
	}
}
