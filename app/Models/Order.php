<?php

namespace App\Models;

class Order extends BaseModel
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        "clientele_id",
        "product_id",
        "num",
        "price",
        "after_num",
        "status"
    ];

    protected $appends = ['status_att'];

    public static $EnumStatus = [0 => '未收款', 1 => '已收款', 7 => '已取消'];

    public function getStatusAttAttribute()
    {
        return self::$EnumStatus[$this->status] ?? $this->status;
    }

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
