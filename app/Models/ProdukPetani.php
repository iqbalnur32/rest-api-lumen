<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukPetani extends Model
{
    protected $table = 'produk_petani';	
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_grade_sayuran',
    	'id_toko',
        'product_name',
        'stock',
        'price'
    ];

}	
