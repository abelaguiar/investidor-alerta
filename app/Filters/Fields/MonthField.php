<?php

namespace App\Filters\Fields;

class MonthField
{
    public function filter($builder, $value)
    {
        return $builder->where('month', $value);
    }
}
