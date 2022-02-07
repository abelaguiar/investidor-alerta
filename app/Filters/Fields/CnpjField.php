<?php

namespace App\Filters\Fields;

class CnpjField
{
    public function filter($builder, $value)
    {
        return $builder->where('cnpj', 'like', "%$value%");
    }
}
