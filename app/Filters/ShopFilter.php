<?php

namespace App\Filters;

use AbelAguiar\Filter\AbstractFilter;
use App\Filters\Fields\NameField;

class ShopFilter extends AbstractFilter
{
    protected $filters = [
        'name' => NameField::class,
    ];
}
