<?php

namespace App\Admin\Forms;

use App\Models\User;
use App\Models\UserIdentity as UserIdentityModel;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Dcat\Admin\Contracts\LazyRenderable;
use Illuminate\Support\Facades\Log;

class CheckUser extends Form implements LazyRenderable
{
    use LazyWidget; // 使用异步加载功能

    // 处理请求
    public function handle(array $input)
    {
        // 获取外部传递参数
        $id = $this->payload['id'] ?? null;

        // 表单参数
        $identity = $input['identity'] ?? 0;
        $remark = $input['remark'] ?? null;
        $status = $input['status'] ?? 0;

        if (! $id) {
            return $this->response()->error('参数错误');
        }

        $userIdentity = UserIdentityModel::query()->find($id);
        $user = User::query()->find($userIdentity->user_id);

        if (!is_object($userIdentity)) {
            return $this->response()->error('数据错误');
        }
        if (!is_object($user)) {
            return $this->response()->error('用户不存在');
        }

        $userIdentity->update([
            'identity' => $identity,
            'remark' => $remark,
            'status' => $status,
        ]);
        $user->update([
            'identity' => $identity,
        ]);

        return $this->response()->success('审核成功')->refresh();
    }

    public function form()
    {
        $userIdentity = UserIdentityModel::query()->find($this->payload['id']);
        if ($userIdentity->status == 0){
            $this->radio('identity')->options(User::$EnumIdentity)->default($userIdentity->identity);
            $this->textarea('remark')->default($userIdentity->remark);
            $this->radio('status')->options(UserIdentityModel::$EnumStatus)->default($userIdentity->status);
        } else {
            $this->radio('identity')->options(User::$EnumIdentity)->default($userIdentity->identity)->disable();
            $this->textarea('remark')->default($userIdentity->remark)->disable();
            $this->radio('status')->options(UserIdentityModel::$EnumStatus)->default($userIdentity->status)->disable();
        }
    }

}
