<?php

namespace App\View\Composers;

use App\Transformers\ManufacturersTransformer;
use Roots\Acorn\View\Composer;
use WP_Query;

class ManufacturersComposer extends Composer
{
    protected static $views = [
        'template-manufacturers',
    ];

    public function with(): array
    {
        return [
            'manufacturers' => $this->manufacturers(),
        ];
    }

	public function manufacturers(): array
	{
		$manufacturers = (new WP_Query([
			'post_type' => 'manufacturers',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		]))->get_posts();

		return (new ManufacturersTransformer($manufacturers))->toData();
	}
}
