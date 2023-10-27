<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleAbilities extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table = 'role_abilities';
    protected $fillable = ['role_id', 'ability','type'];
}
