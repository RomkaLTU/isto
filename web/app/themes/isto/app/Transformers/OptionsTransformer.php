<?php

declare(strict_types = 1);

namespace App\Transformers;

use Illuminate\Support\Str;

class OptionsTransformer
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
            $data[Str::after($item->option_name, 'options_')] = $item->option_value;
        }

        return $data;
    }
}
