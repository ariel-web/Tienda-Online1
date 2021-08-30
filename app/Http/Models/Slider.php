<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'slider';
    protected $hidden = ['created_at','updated_at'];
    
}
