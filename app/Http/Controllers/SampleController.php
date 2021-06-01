<?php


namespace App\Http\Controllers;


use App\Models\Sample;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $query = Sample::with(['clientele', 'product', 'user']);
        if($request->user()->identity == 0){
            $query = $query->where('user_id', $request->user()->id);
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
