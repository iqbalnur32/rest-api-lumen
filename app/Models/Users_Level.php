<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users;

class Users_Level extends Model
{
    protected $table = 'users_level';	
    protected $primaryKey = 'id_level';

    public function users()
    {
    	return $this->belongsTo(Users::class);
    }

}	
