<?php

namespace App\Models\admin;

use App\Models\admin\Agent;
use App\Models\admin\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Post extends Model 
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['admin_id','agent_id','name_ar','name_en','description_ar','description_en','logo','slug_ar','slug_en'];
    protected $dates=['deleted_at'];

    /**
     * Get the user that owns the posts
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }

    /**
     * The tags that belong to the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post-tag', 'post_id', 'tag_id','id','id');
    }

   

  public function scopeFilter(Builder $builder, $filters)
  {
    if ($filters['name'] ?? false) {
      $builder->where('name_' . (App::getLocale() == 'en' ? 'en' : 'ar'), 'LIKE', "%{$filters['name']}%");
    }
       
  }
      
}
