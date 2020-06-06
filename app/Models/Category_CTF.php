<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users_Level;

class Category_CTF extends Model
{
    protected $table = 'category_ctf';	
    protected $primaryKey = 'id_category';
    protected $fillable = [
    	'id_category'
    ];

}	
