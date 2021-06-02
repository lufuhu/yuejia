<?php


namespace App\Http\Controllers;


use App\Models\Clientele;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductsStore;
use App\Models\Sample;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function statistics()
    {
        $data['day'] = $this->getStatData(date('Y-m-d 00:00:00'), date('Y-m-d 23:59:59'));
        $data['month'] = $this->getStatData(date('Y-m-01 00:00:00'), date('Y-m-d 23:59:59'));
        $data['quarter'] = $this->getStatData(date('Y-04-01 00:00:00'), date('Y-m-d 23:59:59'));
        $data['year'] = $this->getStatData(date('Y-01-01 00:00:00'), date('Y-m-d 23:59:59'));
        return $this->response($data);
    }
    private function getStatData($start_time, $end_time){
        $profit = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select(DB::raw('(sum((orders.num - orders.after_num) * orders.price - (orders.num - orders.after_num) * (products.naked_price + products.consumable + products.carriage))) as profit'))
            ->whereBetween('orders.created_at', [$start_time, $end_time])
            ->first();
        $turnover = Order::select(DB::raw('sum((num - after_num) * price) as turnover'))
            ->whereBetween('created_at', [$start_time, $end_time])
            ->first();
        $data['turnover'] = (String)$turnover->turnover;
        $order_num = Order::whereBetween('created_at', [$start_time, $end_time])->sum('num');
        $data['order_num'] = (String)$order_num;
        $dataNum = ceil((min(strtotime($end_time), time()) - strtotime($start_time)) / 86400);
        $data['order_daily_num'] = (String)((int)($order_num / $dataNum));
        $data['profit'] = (String)$profit->profit;
        $data['sample_num'] = (String)Sample::whereBetween('created_at', [$start_time, $end_time])->sum('num');
        return $data;
    }

    public function getSelectData(){
        $clienteles = Clientele::select('name as label', 'id as value')->get();
        $products = Product::select('title as label', 'id as value')->get();
        return $this->response(compact('clienteles','products'));
    }

    public function index(Request $request)
    {
        $query = Order::with(['clientele', 'product', 'user']);
        $identity = $request->input('identity', $request->user()->identity);
        if($identity == 1){
            $query = $query->where('user_id', $request->user()->id);
        }
        if ($request->input('start_date') && $request->input('end_date')){
            $query = $query->whereBetween('created_at', [$request->input('start_date'). ' 00:00:00', $request->input('end_date') . ' 23:59:59']);
        }
        $list = $query->orderBy('created_at', 'desc')->paginate();
        return $this->response($list);
    }

    public function store(Request $request, Order $obj)
    {
        $all = $request->all();
        $obj->fill($all);
        $obj->user_id = $request->user()->id;
        $obj->save();
        $user = $request->user();
        $remark = User::$EnumIdentity[$user->identity] . "（" . $user->nickname . "）出单";
        ProductsStore::saveNum($request->input('product_id'), -$request->input('num'), $remark, $user->id);
        return $this->response();
    }

    public function update($id, Request $request)
    {
        $obj = Order::find($id);
        $obj->update($request->all());
        return $this->response();
    }

    public function destroy($id)
    {
        $obj = Order::find($id);
        $obj->delete();
        return $this->response();
    }
}
