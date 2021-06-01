<?php


namespace App\Http\Controllers;


use App\Models\User;
use App\Models\UserIdentity;
use Illuminate\Http\Request;

class UserIdentityController extends Controller
{
    public function index(Request $request)
    {
        $list = UserIdentity::with('user')->orderBy('id', 'desc')->paginate();
        return $this->response($list);
    }

    public function store(Request $request, UserIdentity $obj)
    {
        $obj->user_id = $request->user()->id;
        $obj->status = 0;
        $obj->identity = $request->input('identity');
        $obj->save();
        UserIdentity::where('user_id',$obj->user_id)
            ->where('id', '>', $obj->id)
            ->where('status', 0)
            ->update(['status' => 3]);
        return $this->response();
    }

    public function update($id, Request $request)
    {
        $obj = UserIdentity::find($id);
        $obj->update(['status' => $request->input('status'), 'remark' => $request->input('remark')]);
        if ($request->input('status') == 1) {
            $user = User::where('id', $obj->user_id)->first();
            $user->update(['identity' => $obj->identity]);
        }
        return $this->response();
    }

}
