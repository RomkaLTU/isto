<?php

namespace App\View\Composers;

use Illuminate\Support\Arr;
use Roots\Acorn\View\Composer;
use WP_Query;

class SinglePostComposer extends Composer
{
	protected static $views = [
		'partials.content-single',
	];

	public function with(): array
	{
		return [
			'related_post_ids' => $this->relatedPostIds()
		];
	}

	public function relatedPostIds(): array
	{
		$query = new WP_Query([
			'post_type' => 'post',
			'post__not_in' => [get_queried_object_id()],
			'post_status' => 'publish',
			'ignore_sticky_posts' => true,
			'orderby' => 'rand',
			'posts_per_page' => 3,
		]);

		return Arr::pluck($query->get_posts(), 'ID');
	}
}
