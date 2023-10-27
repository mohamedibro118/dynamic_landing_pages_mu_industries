<?php

namespace App\Models\admin;

use App\Concerns\HasRoles;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    use SoftDeletes;
    protected $fillable = [
        'name', 'username', 'password', 'phone_number', 'email', 'suber_admin', 'status','agent_id'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   

    public function profile()
    {
        return $this->hasOne(AdminProfile::class, 'admin_id', 'id')->withDefault();
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }


    public function properties()
    {
        return $this->hasMany(Property::class, 'admin_id');
    }
}
