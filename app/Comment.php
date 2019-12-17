<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id', 'post_id','user_id','content', 'rating',
    ];


    public function user(){

        return $this->belongsTo('App\User');

    }
}
