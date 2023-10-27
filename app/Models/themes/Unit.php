<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Traits\Myfun;

class Unit extends Model
{
    use Myfun;
    use HasFactory;
    public $fillable = [
        'section_id',
        'identifier',
        'img_url',
        'type',
        'price',
        'bedrooms',
        'pathrooms',
        'description',
        'surface'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function scopeUpdateOrCreateUnit(Builder $query,$sectionId,$unit)
    {
        // Check if a logo with the same identifier exists for the section
     
        $existingunit = $query->where('section_id', $sectionId)->where('id', $unit['id'] ?? null)->first();
        if ($existingunit) {
            if ($existingunit->img_url){Storage::delete($existingunit->img_url);}
            $existingunit->img_url = $unit['img_url']??null;
            $existingunit->description = $unit['description']??null;
            $existingunit->type = $unit['type']??null;
            $existingunit->price = $unit['price']??null;
            $existingunit->surface = $unit['surface']??null;
            $existingunit->bedrooms = $unit['bedrooms']??null;
            $existingunit->bathrooms = $unit['bathrooms']??null;
            $existingunit->save();
        } else {
            $unitop = new self();
            $unitop->section_id = $sectionId;
            $unitop->img_url = $unit['img_url']??null;
            $unitop->description = $unit['description']??null;
            $unitop->type = $unit['type']??null;
            $unitop->price = $unit['price']??null;
            $unitop->surface = $unit['surface']??null;
            $unitop->bedrooms = $unit['bedrooms']??null;
            $unitop->bathrooms = $unit['bathrooms']??null;
            
            $unitop->save();
        }
    }
}
