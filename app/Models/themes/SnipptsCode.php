<?php

namespace App\Models\themes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnipptsCode extends Model
{
    use HasFactory;
    public $fillable=['agent_id','admin_id','google_script','google_noscript'];
}
