<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Myfun;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use Myfun;
    use HasFactory;
    protected $fillable = [
        'section_id', 'identifier', 'photo'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function scopeUpdateOrCreatePhotos(Builder $query, $sectionId, $identifier, $image,$width,$height)
    {
        // Check if a logo with the same identifier exists for the section
        $existingphoto = $query
            ->where('section_id', $sectionId)
            ->where('identifier', $identifier)
            ->first();

        if ($existingphoto) {
            // Update the existing logo
            Storage::delete($existingphoto->photo); // Delete the old logo file
            $logoPath = $this->uploadeImg($image, 'theme1/photos',$width,$height); // Store the updated logo image

            // Update the existing logo entry
            $existingphoto->photo = $logoPath;
            $existingphoto->save();
        } else {
            // Create a new logo entry for the specific section
            $logoPath = $this->uploadeImg($image, 'theme1/photos',$width,$height); // Store the new logo image

            $newLogo = new self();
            $newLogo->section_id = $sectionId;
            $newLogo->identifier = $identifier;
            $newLogo->photo = $logoPath;
            $newLogo->save();
        }
    }
}
