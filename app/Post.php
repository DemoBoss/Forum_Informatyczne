<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name','content','topic_id','user_id', 'closed'
    ];



}
