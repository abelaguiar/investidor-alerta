<?php

namespace App\Models;

use App\Unit;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'uf'
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
