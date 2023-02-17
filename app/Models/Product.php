<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Product extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'product_name',
        'product_sku_id'
    ];

    public function variants(){
        return $this->hasMany('App\Models\ProductVariant','product_id','id');
    }

    public function categories(){
        return $this->hasMany('App\Models\ProductCategory','product_id','id');
    }

    public function variant_combinations(){
        return $this->hasMany('App\Models\ProductVariantCombination','product_id','id');
    }
}
