<?php

namespace App\Filters\Fields;

class EmailField
{
    public function filter($builder, $value)
    {
        return $builder->where('email', 'like', "%$value%");
    }
}
