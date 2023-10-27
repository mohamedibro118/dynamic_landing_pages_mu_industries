<?php

namespace App\Models\admin;

use App\Concerns\HasRoles;
use App\Models\Message;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_seen'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(AdminProfile::class,'user_id','id')->withDefault();;
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class,'agent_id','id');
    }
    
    
    public function message(){
        return $this->hasMany(Message::class,'sender_user');
    }
    public function getlastmessage()
    {
        $lastmessage=$this->message->last();
        $lastmessagename='';
        if($lastmessage->file){
            $lastmessagename='file';
        }else{
            $lastmessagename=$lastmessage->message;
        }
        return $lastmessagename;
    }
    public function getlastmessagetime()
    {  
        if ($this->message->last()) {
             return $this->message->last()->created_at;
    }
        }
       

}
