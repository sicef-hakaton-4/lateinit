<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{

    protected $hidden = ['expert_id', 'opening_id'];

    protected $fillable = ['expert_id', 'opening_id'];



    //		-- Relationships --

    public function expert() {
    	return $this->belongsTo('App\User', 'expert_id');
    }

    public function opening() {
    	return $this->belongsTo('App\Opening');
    }

}
