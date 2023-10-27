<?php

namespace App\Models\admin;

use App\Models\admin\CompanyProfile;
use App\Models\admin\Developer;
use App\Models\admin\Property;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Agent extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
    'name_en',
    'name_ar',
    'slug_en',
    'slug_ar',
    'status'];

    public function admins(){
        return $this->hasMany(Admin::class,'agent_id','id');
    }
    public function developers(){
        return $this->hasMany(Developer::class,'agent_id','id');
    }
    public function properties(){
        return $this->hasMany(Property::class,'agent_id','id');
    }
    public function compounds(){
        return $this->hasMany(Compound::class,'agent_id','id');
    }

    public function companyprofile()
    {
        return $this->hasOne(CompanyProfile::class,'agent_id','id');
    }



    public function scopeFilter(Builder $builder,$filters){
       if ($filters['name'] ?? false) {
        $builder->where('name_'.(App::getLocale()=='en'?'en':'ar'),'LIKE',"%{$filters['name']}%");
       }
    
    }

}
