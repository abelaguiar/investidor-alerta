<?php

namespace App\Filters\Fields;

class YearField
{
    public function filter($builder, $value)
    {
        return $builder->whereYear('created_at', '=', $value);
    }
}
