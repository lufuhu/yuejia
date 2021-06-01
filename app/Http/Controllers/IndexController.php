<?php


namespace App\Http\Controllers;


use App\Models\Clientele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    public function test(){
//        $obj = Clientele::first();
//        dd($obj->toArray());
//        dd(new ClienteleResource($obj));
//       $data = ClienteleResource::collection(Clientele::all());
//       return $this->response($data);
//        $list = Clientele::paginate();
//        return $this->response(ClienteleResource::collection($list));
    }

    public function upload(Request $request)
    {
        $url = Storage::putFile('public/upload/' . date("Ymd"), $request->file('file'));
        return $this->response(env('APP_URL').'/'.str_replace('public/', '', $url));
    }

}
