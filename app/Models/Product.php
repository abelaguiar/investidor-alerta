<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'product_topic');
    }

    public function nameWithTopic()
    {
        if (is_null($this->topics->first())) {
            return $this->name;
        }

        return $this->name . ' - ' . $this->topics->first()->name;
    }
}
