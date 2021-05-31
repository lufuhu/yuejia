<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        "clientele_id",
        "product_id",
        "num",
        "price",
        "after_num"
    ];

    public function clientele()
    {
        return $this->hasOne('App\Models\Clientele', 'id', 'clientele_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
