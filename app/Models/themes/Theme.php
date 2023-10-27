<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Myfun;

class Theme extends Model
{
    use Myfun;
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title', 'index_url', 'view_url', 'img_url', 'description'
    ];
}
