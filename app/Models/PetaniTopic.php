<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetaniTopic extends Model
{
    protected $table = 'topic_petani';	
    protected $primaryKey = 'id_topic';

    protected $foreignKey = 'id_reply';

    protected $fillable = [
        'id_users',
    	'title',
    	'content'
    ];

    public function replyPetani()
    {
    	 return $this->hasMany('App\Models\PetaniReply', 'id_reply', 'id_topic');
    }

}	
