<?php


namespace App\Http\Controllers;


use App\Models\Clientele;
use App\Models\Order;
use App\Models\Product;
use App\Models\Sample;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function statistics()
    {
        $start_time = date('Y-m-d 00:00:00');
        $end_time = date('Y-m-d 23:59:59');
        $day['turnover'] = Order::whereBetween('created_at', [$start_time, $end_time])->sum('price');
        $day['order_num'] = Order::whereBetween('created_at', [$start_time, $end_time])->count('num');
        $dayNum = ceil((min(strtotime($end_time), time()) - strtotime($start_time)) / 86400);
        $day['order_daily_num'] = (int)($day['order_num'] / $dayNum);
        $samplePrice = Sample::whereBetween('created_at', [$start_time, $end_time])->sum('price');
        $day['profit'] = $day['turnover'] - $samplePrice;
        $day['sample_num'] = Sample::whereBetween('created_at', [$start_time, $end_time])->count('num');
        $data['day'] = $day;
        $data['month'] = $day;
        $data['quarter'] = $day;
        $data['year'] = $day;
        return $this->response($data);
    }

    public function getSelectData(){
        $clienteles = Clientele::select('name as label', 'id as value')->get();
        $products = Product::select('title as label', 'id as value')->get();
        return $this->response(compact('clienteles','products'));
    }

    public function index(Request $request)
    {
        $query = new Order();
        if($request->user()->identity == 0){
            $query = $query->where('user_id', $request->user()->id);
        }
        $list = $query->paginate();
        foreach ($list as $item) {
            $item->clientele;
            $item->product;
            $item->user;
        }
        return $this->response($list);
    }

    public function store(Request $request, Order $obj)
    {
        $all = $request->all();
        $obj->fill($all);
        $obj->user_id = $request->user()->id;
        $obj->save();
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