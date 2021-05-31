<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserIdentity extends Model
{
    protected $table = 'user_identity';
    protected $fillable = [
        'user_id',
        'identity',
        'remark',
        'status',
    ];

    public static $EnumStatus = [0 => '待审核', 1 => '通过', 2 => '拒绝'];
    public static $EnumIdentity = [0 => '用户', 1 => '员工', 2 => '管理员'];
}
