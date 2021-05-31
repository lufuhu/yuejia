<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $table = 'samples';

    protected $fillable = [
        'user_id',
        "clientele_id",
        "product_id",
        "specification",
        "num",
        "price",
        "carriage"
    ];

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function clientele()
    {
        return $this->hasOne('App\Models\Clientele', 'id', 'clientele_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
