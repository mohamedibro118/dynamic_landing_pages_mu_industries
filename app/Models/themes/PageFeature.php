<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Traits\Myfun;

class PageFeature extends Model
{
    use Myfun;
    use HasFactory;
    public $fillable = [
        'section_id',
        'identifier',
        'icon_url',
        'description'
    ];



    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function scopeUpdateOrCreateFeature(Builder $query, $sectionId, $feature)
    {
        // Check if a logo with the same identifier exists for the section
        $existingfeature = $query
            ->where('section_id', $sectionId)
            ->where('id', $feature['id'] ?? null)
            ->first();

        if ($existingfeature) {
            if ($existingfeature->icon_url) {
                Storage::delete($existingfeature->icon_url);
            }   
            // Update the existing logo entry
            $existingfeature->icon_url = $feature['icon_url']??null;
            $existingfeature->description = $feature['description']??null;
            $existingfeature->save();
        } else {
            $featureop = new self();
            $featureop->section_id = $sectionId;
            $featureop->icon_url = $feature['icon_url']??null;
            $featureop->description = $feature['description']??null;
            $featureop->save();
        }
    }
}
