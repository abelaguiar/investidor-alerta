<?php

namespace App\Models;

use AbelAguiar\Filter\RequestFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shop extends Model
{
    use HasFactory, SoftDeletes, RequestFilter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cnpj',
        'name',
        'cep',
        'address',
        'address_number',
        'complements',
        'state_id',
        'city_id',
        'details'
    ];

    protected static $filter = 'App\Filters\ShopFilter';

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function VISITORs()
    {
        return $this->belongsToMany(VISITOR::class)
            ->withPivot('approved');
    }

    public function scopePluckCustom()
    {
        return $this->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id , 
                    'name' => $item->cnpj . ' - ' . $item->name
                ];
            })->pluck('name', 'id');
    }
}
