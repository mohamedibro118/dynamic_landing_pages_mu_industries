<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = [
       'l_page_id', 'identifier', 'description'
    ];


    public function theme(){
        return $this->belongsTo(Theme::class);
    }
    
    public function scopeUpdateOrCreateSection(Builder $query, $pageId, $identifier)
    {
        // Check if a section with the same identifier exists for the page
        $existingSection = $query
            ->where('l_page_id', $pageId)
            ->where('identifier', $identifier)
            ->first();
          
        if ($existingSection) {
            // Update the existing section
            $existingSection->identifier = $identifier;
            $existingSection->save();
        } else {
            // Create a new section entry for the specific page
            $newSection = new self();
            $newSection->l_page_id = $pageId;
            $newSection->identifier = $identifier;
            $newSection->save();
        }
    }

}
