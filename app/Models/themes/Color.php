<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_id', 'identifier', 'color'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function scopeUpdateOrCreatecolor(Builder $query, $sectionId, $identifier, $color)
    {
        // Check if a logo with the same identifier exists for the section
        $existingcolor = $query
            ->where('section_id', $sectionId)
            ->where('identifier', $identifier)
            ->first();

        if ($existingcolor) {
            // Update the existing logo entry
            $existingcolor->color = $color;
            $existingcolor->save();
        } else {
            $newdesc = new self();
            $newdesc->section_id = $sectionId;
            $newdesc->identifier = $identifier;
            $newdesc->color = $color;
            $newdesc->save();
        }
    }
}
