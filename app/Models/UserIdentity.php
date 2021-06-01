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

    public static $EnumStatus = [0 => '待审核', 1 => '通过', 2 => '拒绝', 3 => '失效'];

    public function getStatusAttAttribute()
    {
        return self::$EnumStatus[$this->status] ?? $this->status;
    }

    public function getIdentityAttAttribute()
    {
        return User::$EnumIdentity[$this->identity] ?? $this->identity;
    }


    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
