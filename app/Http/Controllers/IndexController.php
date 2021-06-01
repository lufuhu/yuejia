<?php


namespace App\Http\Controllers;


use App\Http\Resources\ClienteleResource;
use App\Models\Clientele;

class IndexController extends Controller
{
    public function test(){
//        $obj = Clientele::first();
//        dd(new ClienteleResource($obj));
       $data = ClienteleResource::collection(Clientele::all());
       return $this->response($data);
    }
}
