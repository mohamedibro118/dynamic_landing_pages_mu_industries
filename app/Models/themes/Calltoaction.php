<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calltoaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id','identifier', 'cta'
    ];


    public function scopeUpdateOrCreateCta(Builder $query, $sectionId, $identifier, $cta)
    {
        // Check if a logo with the same identifier exists for the section
       
        $existingcta = $query
            ->where('section_id', $sectionId)
            ->where('identifier', $identifier)
            ->first();
          
        if ($existingcta) {
            $existingcta->cta = json_encode($cta);;
            $existingcta->save();
        } else {
            // Store the new gallary images
            $newcta = new $this();
            $data['section_id']= $sectionId;
            $data['identifier']= $identifier;
            $data['cta'] = json_encode($cta);
            $newcta->create($data);
        }
    }
}
