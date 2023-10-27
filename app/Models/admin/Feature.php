<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Feature extends Model
{
    use HasFactory;
    protected $fillable=['name_en','name_ar','description_en','description_ar'];


   
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_feature', 'property_id', 'feature_id');
    }
    public function compounds()
    {
        return $this->belongsToMany(Compound::class, 'compound_feature', 'compound_id', 'feature_id');
    }

    public function scopeFilter(Builder $builder,$filters){

        if ($filters['name'] ?? false) {
            $builder->where('name_'.(App::getLocale()=='en'?'en':'ar'),'LIKE',"%{$filters['name']}%");  
        }
        

    }
}
