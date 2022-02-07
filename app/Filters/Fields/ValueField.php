<?php

namespace App\Filters\Fields;

class ValueField
{
    public function filter($builder, $value)
    {
        return $builder->where('value', 'like', "%$value%");
    }
}
