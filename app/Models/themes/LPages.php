<?php

namespace App\Models\themes;

use App\Models\admin\Agent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class LPages extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'agent_id', 'admin_id',
        'theme_id', 'title', 'slug', 'whats', 'mobile', 'email', 'massenger', 'google_script', 'google_noscript'
    ];
    protected static function booted()
    {
        static::addGlobalScope('store', function (Builder $builder) {
            $user = Auth::guard('admin')->user();
            if ($user && $user->agent_id) {
                $builder->where('agent_id', $user->agent_id);
            }
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
    
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }
}
