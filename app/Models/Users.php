<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users_Level;

class Users extends Model
{
    protected $table = 'users_ctf';	
    protected $primaryKey = 'id_users';

    public function users_level()
    {	
    	return $this->hasMany(Users_Level::class);
    }

}	
