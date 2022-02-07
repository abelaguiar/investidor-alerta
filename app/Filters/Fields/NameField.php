<?php

namespace App\Filters\Fields;

class NameField
{
    public function filter($builder, $value)
    {
        return $builder->where('name', 'like', "%$value%");
    }
}
