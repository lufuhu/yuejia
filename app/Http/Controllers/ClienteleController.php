<?php


namespace App\Http\Controllers;


use App\Models\Clientele;
use Illuminate\Http\Request;

class ClienteleController extends Controller
{
    public function index(Request $request)
    {
        $list = Clientele::paginate();
        return $this->response($list);
    }

    public function store(Request $request, Clientele $obj)
    {
        $all = $request->all();
        $obj->fill($all);
        $obj->user_id = $request->user()->id;
        $obj->save();
        return $this->response();
    }

    public function update($id, Request $request)
    {
        $obj = Clientele::find($id);
        $obj->update($request->all());
        return $this->response();
    }

    public function destroy($id)
    {
        $obj = Clientele::find($id);
        $obj->delete();
        return $this->response();
    }
}
