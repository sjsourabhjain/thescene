<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Authenticatable
{
    use SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'category_name',
        'parent_id',
        'status'
    ];

    // public function parent_category(){
    //     return $this->hasOne(Category::class,"id","parent_id");
    // }

    // public function product_category(){
    //     return $this->hasMany(Product::class,"id","category_id");
    // }
}
