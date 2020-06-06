<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users_Level;

class Score_CTF extends Model
{
    protected $table = 'score_ctf';	
    protected $primaryKey = 'id_score';
    protected $fillable = [
    	'id_users',
    	'score',
    ];
}	
