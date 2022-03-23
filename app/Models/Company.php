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
        'links',
        'cnpj'
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
        return $this->with(['avaliations'])
            ->get()->map(function ($company, $key) {
                return [
                    'medium' => $company->mediumAvaliation(),
                    'content' => $company
                ];
            })->sortDesc();
    }

    public function avaliationsWithOrderCount()
    {
        return $this->avaliations->map(
            function ($avaliation, $key) {
                return [
                    'avaliation' => $avaliation->avaliation_count,
                    'content' => $avaliation
                ];
            })->sortDesc();
    }
}
