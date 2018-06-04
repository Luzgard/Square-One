<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dishwasher extends Model
{
    protected $fillable = ['title', 'price', 'image', 'user_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
