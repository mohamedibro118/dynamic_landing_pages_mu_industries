<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Myfun;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class Gallary extends Model
{
    use Myfun;
    use HasFactory;
    protected $fillable = [
        'section_id', 'identifier', 'gallary'
    ];


    public function scopeUpdateOrCreateGallary(Builder $query, $sectionId, $identifier, $gallaryFiles)
    {
        // Check if a logo with the same identifier exists for the section
       
        $existinggallary = $query
            ->where('section_id', $sectionId)
            ->where('identifier', $identifier)
            ->first();
          
        if ($existinggallary) {
            // Update the existing logo
            $this->deleteprev($existinggallary->gallary); // Delete the old logo file 
            // Update the existing logo entry
            $existinggallary->gallary = json_encode($this->uplaodeGallary($gallaryFiles, 'theme1/gallary'));;
            $existinggallary->save();
        } else {
            // Store the new gallary images
            $newgallary = new $this();
            $data['section_id']= $sectionId;
            $data['identifier']= $identifier;
            $data['gallary'] = json_encode($this->uplaodeGallary($gallaryFiles, 'theme1/gallary'));
            $newgallary->create($data);
        }
    }
}
