<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Traits\Myfun;
class Logos extends Model
{
    use HasFactory;
    use Myfun;
    protected $fillable = [
        'section_id','identifier', 'logo'
    ];

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function scopeUpdateOrCreateLogos(Builder $query, $sectionId, $identifier, $logo,$width,$height)
    {
        // Check if a logo with the same identifier exists for the section
       
        $existingLogo = $query
            ->where('section_id', $sectionId)
            ->where('identifier', $identifier)
            ->first();
          
        if ($existingLogo) {
            // Update the existing logo
            Storage::delete($existingLogo->logo); // Delete the old logo file
            $logoPath = $this->uploadeImg($logo, 'theme1/logos',$width,$height); // Store the updated logo image

            // Update the existing logo entry
            $existingLogo->logo = $logoPath;
            $existingLogo->save();
        } else {
            // Create a new logo entry for the specific section
            $logoPath = $this->uploadeImg($logo, 'theme1/logos',$width,$height); // Store the new logo image
            $newLogo = new $this();
            $newLogo->section_id = $sectionId;
            $newLogo->identifier = $identifier;
            $newLogo->logo = $logoPath;
            $newLogo->save();
        }
    }

}
