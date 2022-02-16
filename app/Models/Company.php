<?php

namespace App\Models;

use AbelAguiar\Filter\RequestFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes, RequestFilter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'links'
    ];

    protected static $filter = 'App\Filters\CompanyFilter';

    public function avaliations()
    {
        return $this->hasMany(Avaliation::class);
    }
}
