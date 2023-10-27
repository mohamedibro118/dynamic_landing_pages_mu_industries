<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name_ar', 'name_en', 'slug_ar', 'slug_en'];

    public function posts()
    {
        return $this->belongsToMany(post::class, 'post_tag', 'post_id', 'tag_id');
    }


    public function scopeFilter(Builder $builder, $filters)
    {
        if ($filters['name'] ?? false) {
            $builder->where('name_' . (App::getLocale() == 'en' ? 'en' : 'ar'), 'LIKE', "%{$filters['name']}%");
        }
    }
}
