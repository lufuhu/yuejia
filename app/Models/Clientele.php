<?php

namespace App\Models;

class Clientele extends BaseModel
{
    protected $table = 'clienteles';

    protected $fillable = [
        'name',
        "platform",
        "contact_name",
        "contact_wx",
        "contact_tel",
        "contact_post",
        "group",
        "address",
        "address_name",
        "address_tel",
        "level",
    ];

    protected $appends = ['platform_att'];

    public static $EnumPlatform = [
        '社群平台',
        '社区平台',
        '直播平台',
        '供应链',
        '线下经销商',
    ];

    public function getPlatformAttAttribute()
    {
        return self::$EnumPlatform[$this->platform] ?? $this->platform;
    }
}
