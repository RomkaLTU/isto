<?php

declare(strict_types = 1);

namespace App\Transformers;

use Illuminate\Support\Str;

class OptionsTransformer
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function toData(): array
    {
        $data = [];

        foreach ($this->data as $option) {
            $data[Str::after($option->option_name, 'options_')] = $option->option_value;
        }

        return $data;
    }
}
