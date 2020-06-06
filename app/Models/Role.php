<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function isRole($check_role)
    {
        $user_roles = self::where(['user_id'=> \Auth::user()->id,'roles'=>$check_role])->first();
        return $user_roles ? true : false;
    }
}