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

    protected $appends = ['status_att','gender_att','identity_att', 'check_user_att'];

    public static $EnumStatus = [0 => '正常', 1 => '禁止登录'];
    public static $EnumGender = [0 => '未知', 1 => '男', 2 => '女'];
    public static $EnumCheckUser = [0 => '否', 1 => '是'];
    public static $EnumIdentity = [0 => '用户', 1 => '员工', 2 => '管理员'];

    public function getStatusAttAttribute()
    {
        return self::$EnumStatus[$this->status] ?? $this->status;
    }

    public function getGenderAttAttribute()
    {
        return self::$EnumGender[$this->gender] ?? $this->gender;
    }

    public function getIdentityAttAttribute()
    {
        return self::$EnumIdentity[$this->identity] ?? $this->identity;
    }
    public function getCheckUserAttAttribute()
    {
        return self::$EnumCheckUser[$this->check_user] ?? $this->check_user;
    }

    public static function getPluckList($key = 'id', $value = 'title')
    {
        return self::pluck($value, $value)->toArray();
    }
}
