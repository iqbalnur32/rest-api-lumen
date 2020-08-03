<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\UsersPetani;

class TokoPetani extends Model
{
    protected $table = 'toko_petani';	
    protected $primaryKey = 'id_toko';

    // protected $fillable = [
    // 	'id_users',
    // 	'title',
    // 	'content'
    // ];

}	
