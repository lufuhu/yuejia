<?php


namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $list = Product::paginate();
        return $this->response($list);
    }
    public function view($id, Request $request){
        $obj = Product::where('id', $id)->first();
        return $this->response($obj);
    }

    public function store(Request $request, Product $obj)
    {
        $all = $request->all();
        $obj->fill($all);
        $obj->save();
        return $this->response();
    }

    public function update($id, Request $request)
    {
        $obj = Product::find($id);
        $obj->update($request->all());
        return $this->response();
    }

    public function destroy($id)
    {
        $obj = Product::find($id);
        $obj->delete();
        return $this->response();
    }
}
