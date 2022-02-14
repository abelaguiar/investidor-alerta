<?php

namespace App\Filters;

use AbelAguiar\Filter\AbstractFilter;
use App\Filters\Fields\NameField;

class CompanyFilter extends AbstractFilter
{
    protected $filters = [
        'name' => NameField::class,
    ];
}
