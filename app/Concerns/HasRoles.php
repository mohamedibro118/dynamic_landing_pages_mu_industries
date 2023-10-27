<?php
namespace App\Concerns;

use App\Models\admin\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->morphToMany(Role::class,'authorizable','user_role');
    }

    public function hasAbility($ability)
    {
        $availableroles=$this->roles();
        return $availableroles->whereHas('abilities',function ($query) use ($ability){
            $query->where('ability',$ability)
           ->where('type','allow');
        })->exists();
    }

    
}