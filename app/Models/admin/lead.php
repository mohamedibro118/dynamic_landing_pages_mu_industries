<?php

namespace App\Models\admin;

use App\Models\admin\Agent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lead extends Model
{
  use HasFactory;
  protected $fillable = [
    'agent_id',
    'admin_id',
    'name',
    'phone',
    'other_phone',
    'email',
    'call_time',
    'messege',
    'source',
    'source_id'
  ];
  public function agent()
  {
    return $this->belongsTo(Agent::class, 'agent_id');
  }


  public function scopeFilter(Builder $builder, $filters)
  {
    $builder->when(!empty($filters['min_time']) || !empty($filters['max_time']), function ($q) use ($filters) {
      $min = date('Y-m-d H:i:s', strtotime($filters['min_time'] . ' 00:00:00')); // convert to datetime with minimum time
      $max = date('Y-m-d H:i:s', strtotime($filters['max_time'] . ' 23:59:59')); // convert to datetime with maximum time
      if ($min && $max) {
        return $q->where(function ($query) use ($max, $min) {
          $query->whereBetween('created_at', [$min, $max]);
        });
      } else if ($min) {
        return $q->where('created_at', '>=', $min);
      } else
        return $q->where('created_at', '<=', $max);
    });
  }
}
