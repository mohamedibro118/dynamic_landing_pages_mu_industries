<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Traits\Myfun;

class BackGround extends Model
{
    use Myfun;
    use HasFactory;
    protected $table = 'backgrounds';
    public $fillable = [
        'section_id',
        'identifier',
        'image_url'
    ];

    public function scopeUpdateOrCreateBackgrounds(Builder $query, $sectionId, $identifier, $image,$width,$height)
    {
        // Check if a logo with the same identifier exists for the section
        $existingBg = $query
            ->where('section_id', $sectionId)
            ->where('identifier', $identifier)
            ->first();

        if ($existingBg) {
            // Update the existing logo
            Storage::delete($existingBg->image_url); // Delete the old logo file
            $logoPath = $this->uploadeImg($image, 'theme1/backgrounds',$width,$height); // Store the updated logo image

            // Update the existing logo entry
            $existingBg->image_url = $logoPath;
            $existingBg->save();
        } else {
            // Create a new logo entry for the specific section
            $logoPath = $this->uploadeImg($image, 'theme1/backgrounds',$width,$height); // Store the new logo image

            $newLogo = new self();
            $newLogo->section_id = $sectionId;
            $newLogo->identifier = $identifier;
            $newLogo->image_url = $logoPath;
            $newLogo->save();
        }
    }
}
