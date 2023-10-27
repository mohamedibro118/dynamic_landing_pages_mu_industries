<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{

    use HasFactory;
    protected $table='companyprofiles';
    protected $fillable=[
    'agent_id',
    'description_en',
    'description_ar',
    'mobile',
    'whats',
    'email',
    'address_en',
    'address_ar',
    'facebook',
    'twitter',
    'linkedin',
    'massenger',
    'instagram',
    'youtube',
    'country',
    'locale',
    'logo',
    'footer_logo',
    'gallary',
    'cta_source'
];

public function agent(){
    return $this->belongsTo(Agent::class,'agent_id','id');
}

// public function getGallaryAttribute(){
//     return json_decode($this->gallary);
// }

}
