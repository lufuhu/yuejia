<?php

namespace App\Models;

class Product extends BaseModel
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
        "num",
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
