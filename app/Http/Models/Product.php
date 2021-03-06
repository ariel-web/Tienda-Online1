<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use HasFactory,SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'products';
    protected $hidden = ['created_at','updated_at'];

    public function cate() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

}
