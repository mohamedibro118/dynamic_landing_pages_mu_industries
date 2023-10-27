<?php

namespace App\Models\admin;

use App\Models\admin\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;
    protected $fillable=['admin_id',
    'whats',
    'first_name',
    'last_name',
    'birthday',
    'gender',
    'street_adderss',
    'city',
    'logo',
    'facebook',
    'twitter',
    'linkedin',
    'instagram',
    'state',
    'postal_code',
    'country',
    'locale'];

    public function user(){
        return $this->belongsTo(Admin::class,'admin_id','id');
    }
}
