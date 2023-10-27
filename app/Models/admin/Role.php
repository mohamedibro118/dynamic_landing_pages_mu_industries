<?php

namespace App\Models\admin;

use App\Models\admin\RoleAbilities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable=['name_en','name_ar'];


    public function abilities(){
        return $this->hasMany(RoleAbilities::class);
    }
}
