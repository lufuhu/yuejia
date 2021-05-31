<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasDateTimeFormatter, HasApiTokens, Notifiable;

    protected $fillable = [
        'phone',
        'mail',
        'openid',
        'unionid',
        'nickname',
        'avatarurl',
        'gender',
        'identity',
        'check_user',
        'status',
        'session_key',
        'keyword',
        'last_login_time',
    ];

    public static $EnumStatus = [0 => '正常', 1 => '禁止登录'];
    public static $EnumGender = [0 => '男', 1 => '女', 2 => '未知'];
    public static $EnumCheckUser = [0 => '否', 1 => '是'];
    public static $EnumIdentity = [0 => '用户', 1 => '员工', 2 => '管理员'];
}
