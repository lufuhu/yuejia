<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        "title",
        "specification",
        "group",
        "supplier",
        "naked_price",
        "consumable",
        "carriage",
        "publicity_price",
        "price",
        "activity_price",
        "img",
    ];
//
//    public function getImgAttribute($value)
//    {
//        return explode(',', $value);
//    }
//
//    public function setImgAttribute($value)
//    {
//        $this->attributes['img'] = implode(',', $value);
//    }
}
