<?php


namespace App\Http\Controllers;


use App\Models\ProductsStore;
use App\Models\User;
use Illuminate\Http\Request;

class ProductsStoreController extends Controller
{
    public function index(Request $request)
    {
        $list = ProductsStore::with(['product'])->orderBy('id', 'desc')->paginate();
        return $this->response($list);
    }

    public function store(Request $request, ProductsStore $obj)
    {
        $user = $request->user();
        $remark = User::$EnumIdentity[$user->identity] . "（" . $user->nickname . "）更新库存";
        ProductsStore::saveNum($request->input('product_id'), $request->input('num'), $remark, $user->id);
        return $this->response();
    }

}
