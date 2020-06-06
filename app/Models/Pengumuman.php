<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users_Level;

class Pengumuman extends Model
{
    protected $table = 'pengumuman_ctf';	
    protected $primaryKey = 'id_pengumuman';
    protected $fillable = [
    	'id_pengumuman'
    ];

}	
