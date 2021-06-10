<?php


namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = new Product();
        if ($request->input('keyword')){
            $query = $query->where('title', 'like', "%".$request->input('keyword')."%");
        }
        $list = $query->orderBy('id', 'desc')->paginate();
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
