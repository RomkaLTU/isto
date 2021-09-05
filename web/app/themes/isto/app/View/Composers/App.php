<?php

namespace App\View\Composers;

use App\Transformers\OptionsTransformer;
use Roots\Acorn\View\Composer;

class App extends Composer
{
    protected static $views = [
        '*',
    ];

    public function with(): array
    {
        return [
            'siteName' => $this->siteName(),
            'themeOptions' => $this->themeOptions(),
        ];
    }

    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

	public function themeOptions(): array
	{
		global $wpdb;

		$data = $wpdb->get_results("SELECT * FROM $wpdb->options WHERE option_name LIKE 'options_%'");
		$arr = (new OptionsTransformer($data))->toData();

		return array_filter($arr);
	}
}
