<?php


namespace App\Http\Controllers;


use App\Models\Clientele;
use Illuminate\Http\Request;

class ClienteleController extends Controller
{
    public function getSelectData(){
        $platform = [];
        foreach (Clientele::$EnumPlatform as $k=>$v){
            $platform[] = ['label'=>$v,'value'=>$k];
        }
        return $this->response(compact('platform'));
    }

    public function index(Request $request)
    {
        $list = Clientele::paginate();
        return $this->response($list);
    }
    public function view($id, Request $request){
        $obj = Clientele::where('id', $id)->first();
        return $this->response($obj);
    }
    public function store(Request $request, Clientele $obj)
    {
        $all = $request->all();
        $obj->fill($all);
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
