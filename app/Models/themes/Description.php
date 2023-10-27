<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Description extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id','identifier', 'description'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function scopeUpdateOrCreateDes(Builder $query, $sectionId, $identifier, $desccription)
    {
        // Check if a logo with the same identifier exists for the section
        $existingdesc = $query
            ->where('section_id', $sectionId)
            ->where('identifier', $identifier)
            ->first();

        if ($existingdesc) {
            // Update the existing logo entry
            $existingdesc->description = $desccription;
            $existingdesc->save();
        } else {
            $newdesc = new self();
            $newdesc->section_id = $sectionId;
            $newdesc->identifier = $identifier;
            $newdesc->description = $desccription;
            $newdesc->save();
        }
    }

}
