<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productLangs()
    {
            return $this->hasMany('App\Product_lang');
    }

    public function tags()
    {
            return $this->belongsToMany('App\Tag');
    }

    public function bundles()
    {
            return $this->belongsToMany('App\Bundle');
    }

    public function discounts()
    {
            return $this->belongsToMany('App\Discount');
    }

    public function currencie()
    {
        return $this->hasOne('App\Currencie');
    }

    public function detail_values()
    {
            return $this->hasMany('App\Detail_value');
    }

    public function picture()
    {
        return $this->morphOne('App\Picture', 'pictureable');
    }
}