<?php

namespace App\Models;

use AbelAguiar\Filter\RequestFilter;
use Illuminate\Database\Eloquent\Builder;
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
        'links',
        'cnpj'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    protected static $filter = 'App\Filters\CompanyFilter';

    public function avaliations()
    {
        return $this->hasMany(Avaliation::class);
    }

    public function mediumAvaliation()
    {
        $mediumAvaliation = 0;

        $count = $this->avaliations()->count();
        $sum = $this->avaliations->sum('avaliation_count');

        if ($count) {
            $mediumAvaliation = $sum / $count;
        }

        return round($mediumAvaliation, 0);
    }

    public function scopeListWithOrderMedium()
    {
        return $this->withAvg('avaliations', 'avaliation_count')
            ->orderBy('avaliations_avg_avaliation_count', 'desc')
            ->paginate(10);
    }

    public function avaliationsOrderByCount()
    {
        return $this->avaliations()
            ->orderBy('avaliation_count', 'desc')
            ->paginate(10);
    }

    public function positiveAvaliationCount()
    {
        return $this->avaliations->where('avaliation_count', '>=', 7)->count();
    }

    public function negativeAvaliationCount()
    {
        return $this->avaliations->where('avaliation_count', '<', 7)->count();
    }

    public static function positiveAvaliationTopFive()
    {
        return Company::whereHas('avaliations', function (Builder $query) {
            return $query->where('avaliation_count', '>=', 7);
        })->limit(5)->get();
    }

    public static function negativeAvaliationTopFive()
    {
        return Company::whereHas('avaliations', function (Builder $query) {
            return $query->where('avaliation_count', '<', 7);
        })->limit(5)->get();
    }
}
