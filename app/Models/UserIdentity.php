<?php

namespace App\Models;

class UserIdentity extends BaseModel
{
    protected $table = 'user_identity';
    protected $fillable = [
        'user_id',
        'identity',
        'remark',
        'status',
    ];
    protected $appends = ['status_att', 'identity_att'];

    public static $EnumStatus = [0 => '待审核', 1 => '通过', 2 => '拒绝'];

    public function getIdentityAttAttribute()
    {
        return User::$EnumIdentity[$this->identity] ?? $this->identity;
    }
}
