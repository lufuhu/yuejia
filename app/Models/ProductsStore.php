<?php

namespace App\Models;


use Illuminate\Support\Facades\DB;

class ProductsStore extends BaseModel
{
    protected $table = 'products_store';

    protected $fillable = [
        "user_id",
        "admin_id",
        "product_id",
        "before_num",
        "num",
        "after_num",
        "remark",
    ];

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function admin()
    {
        return $this->hasOne('App\Models\Admin', 'id', 'admin_id');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public static function saveNum($product_id, $num, $remark, $user_id = null, $admin_id = null)
    {
        DB::transaction(function () use ($product_id, $num, $remark, $user_id, $admin_id) {
            $product = Product::query()->find($product_id);
            $productStore = new ProductsStore();
            $productStore->before_num = $product->num;
            $new_num = $product->num + $num;
            $product->update(['num' => $new_num]);
            $productStore->after_num = $new_num;
            $productStore->product_id = $product_id;
            $productStore->num = $num;
            $productStore->admin_id = $admin_id;
            $productStore->user_id = $user_id;
            $productStore->remark = $remark;
            $productStore->save();
        });
    }
}
