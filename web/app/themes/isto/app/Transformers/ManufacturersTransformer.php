<?php

declare(strict_types = 1);

namespace App\Transformers;

class ManufacturersTransformer
{
	private $data;

	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public function toData(): array
	{
		$data = [];

		foreach ($this->data as $item) {
			$manufacturerLogoId = get_field('logo', $item->ID);

			$data[] = [
				'id' => $item->ID,
				'post_date' => $item->post_date,
				'post_title' => $item->post_title,
				'post_content' => $item->post_content,
				'permalink' => get_permalink($item),
				'description' => get_field('description', $item->ID),
				'thumbnail' => [
					'xlarge' => get_the_post_thumbnail_url($item, 'xlarge'),
					'full' => get_the_post_thumbnail_url($item, 'full'),
				],
				'logo' => [
					'xlarge' => wp_get_attachment_image_url($manufacturerLogoId, 'xlarge'),
					'full' => wp_get_attachment_image_url($manufacturerLogoId, 'full'),
				],
			];
		}

		return $data;
	}
}
