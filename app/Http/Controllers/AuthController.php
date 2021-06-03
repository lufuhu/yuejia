<?php


namespace App\Http\Controllers;

use App\Models\User;
use EasyWeChat\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function wxLogin(Request $request)
    {
        if (!$request->input('code')){
            abort(5003);
        }
        $wxAuth = [];
        $openid = $unionid = $session_key = null;
        try {
            $app = Factory::miniProgram(config('wechat'));
            $wxAuth = $app->auth->session($request->input('code'));
            $openid = $wxAuth['openid'];
            $unionid = isset($wxAuth['unionid']) ? $wxAuth['unionid'] : null;
            $session_key = $wxAuth['session_key'];
        } catch (\Exception $e) {
            Log::error("wx-auth", $wxAuth);
            abort(5003);
        }
        if (!$user = User::where('openid', $openid)->first()) {
            $user = new User();
            $params['keyword'] = uniqid();
            $params['identity'] = 2;
            $params['status'] = 0;
            $params['check_user'] = 0;
        }
        $params['openid'] = $openid;
        $params['unionid'] = $unionid;
        $params['session_key'] = $session_key;
        if ($request->input('userInfo')) {
            $params['nickname'] = $request->input('userInfo')['nickName'];
            $params['avatarurl'] = $request->input('userInfo')['avatarUrl'];
            $params['gender'] = $request->input('userInfo')['gender'];
        }
        return $this->doLogin($user, $params);
    }

    public function testLogin(){
        return $this->doLogin(User::first());
    }

    public function doLogin($user, $params = [])
    {
        if ($user->status != 0) {
            abort(5001, User::$EnumStatus[$user->status]);
        }
        $params['last_login_time'] = date("Y-m-d H:i:s", time());
        $user->fill($params);
        if (!$user->save()) {
            abort(5001);
        }
        $token = $user->createToken($user->id);
        return $this->response([
            'token' => $token->plainTextToken,
            'userInfo' => $user
        ]);
    }

    public function loginOut(Request $request)
    {
        $request->user()->tokens()->delete();
        return $this->response();
    }

    public function bindPhone(Request $request)
    {
        $key = 'phone-code-' . $request->input('phone');
        if (Cache::get($key) != $request->input('code')) {
            abort(5009);
        }
        if (is_object(User::where('phone', $request->input('phone'))->first())) {
            abort(5005);
        }
        return $this->doLogin($request->user(), ['phone' => $request->input('phone')]);
    }

    public function bindMail(Request $request)
    {
        $key = 'mail-code-' . $request->input('mail');
        if (Cache::get($key) != $request->input('code')) {
            abort(5009);
        }
        if (is_object(User::where('mail', $request->input('mail'))->first())) {
            abort(5008);
        }
        return $this->doLogin($request->user(), ['mail' => $request->input('mail')]);
    }

    public function phoneCode(Request $request)
    {
        $keyCycle = 'phone-code-' . $request->input('phone') . '-cycle';
        if (Cache::has($keyCycle)) {
            abort(5007);
        }
        $key = 'phone-code-' . $request->input('phone');
        $code = rand(100000, 999999);
        Cache::put($key, $code, 180);
        Cache::put($keyCycle, 1, 60);
        return $this->response(null, '验证码已发送（' . $code . '）');
    }

    public function mailCode(Request $request)
    {
        $keyCycle = 'mail-code-' . $request->input('mail') . '-cycle';
        if (Cache::has($keyCycle)) {
            abort(5007);
        }
        $key = 'mail-code-' . $request->input('mail');
        $code = rand(100000, 999999);
        Cache::put($key, $code, 180);
        Cache::put($keyCycle, 1, 60);
        return $this->response(null, '验证码已发送（' . $code . '）');
    }
}
