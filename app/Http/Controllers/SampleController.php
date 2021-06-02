<?php


namespace App\Http\Controllers;


use App\Models\ProductsStore;
use App\Models\Sample;
use App\Models\User;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $query = Sample::with(['clientele', 'product', 'user']);
        $identity = $request->input('identity', $request->user()->identity);
        if($identity == 1){
            $query = $query->where('user_id', $request->user()->id);
        }
        if ($request->input('start_date') && $request->input('end_date')){
            $query = $query->whereBetween('created_at', [$request->input('start_date'). '00:00:00', $request->input('end_date') . '23:59:59']);
        }
        $list = $query->paginate();
        return $this->response($list);
    }

    public function store(Request $request, Sample $obj)
    {
        $all = $request->all();
        $obj->fill($all);
        $obj->user_id = $request->user()->id;
        $obj->save();
        $user = $request->user();
        $remark = User::$EnumIdentity[$user->identity] . "（" . $user->nickname . "）寄样";
        ProductsStore::saveNum($request->input('product_id'), $request->input('num'), $remark, $user->id);
        return $this->response();
    }

    public function update($id, Request $request)
    {
        $obj = Sample::find($id);
        $obj->update($request->all());
        return $this->response();
    }

    public function destroy($id)
    {
        $obj = Sample::find($id);
        $obj->delete();
        return $this->response();
    }
}
