<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PetaniLevel;

class UsersPetani extends Model
{
    protected $table = 'users_petani';	
    protected $primaryKey = 'id_users';
}	
