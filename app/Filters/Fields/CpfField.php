<?php

namespace App\Filters\Fields;

class CpfField
{
    public function filter($builder, $value)
    {
        return $builder->where('cpf', 'like', "%$value%");
    }
}
