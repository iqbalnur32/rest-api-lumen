<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Users_Level;

class PetaniReply extends Model
{
    protected $table = 'reply_topic_petani';	
    protected $primaryKey = 'id_reply';


    public function topicPetani()
    {
    	return $this->belongsTo('App\Models\PetaniTopic', 'id_topic', 'id_reply');
    }
}	
