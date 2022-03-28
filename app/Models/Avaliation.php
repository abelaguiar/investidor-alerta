<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\UploadedFile;

class Avaliation extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_id',
        'product_id',
        'topic_id',
        'other_product',
        'date_acquisition',
        'description_experience_product',
        'avaliation_count',
        'document',
        'authorize'
    ];

    public function setDateAcquisitionAttribute($value)
    {
        $this->attributes['date_acquisition'] = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getDateAcquisitionAttribute()
    {
        return \DateTime::createFromFormat('Y-m-d', $this->attributes['date_acquisition'])->format('d/m/Y');;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function addDocuments(UploadedFile $document): void
    {
        $destinationFolder = 'avaliations/documents';
        $relativePath = $document->store($destinationFolder, 'public');
        $this->document = '/storage/' . $relativePath;
    }

    public function approved(): void
    {
        $this->authorize = true;
        $this->save();
    }

    public function authorized()
    {
        return $this->where('authorize', true);
    }

    public function notAuthorized()
    {
        return $this->where('authorize', false);
    }

    public function positivePercentage()
    {
        $countAll = $this->authorized()->count();
        $positive = $this->authorized()->where('avaliation_count', '>=', 7)->count();
        
        if ($positive > 0) {
            $positive = ($positive / $countAll) * 100;
        }

        return round($positive, 1);
    }

    public function negativePercentage()
    {
        $countAll = $this->authorized()->count();
        $negative = $this->authorized()->where('avaliation_count', '<', 7)->count();
        
        if ($negative > 0) {
            $negative = ($negative / $countAll) * 100;
        }

        return round($negative, 1);
    }
}
