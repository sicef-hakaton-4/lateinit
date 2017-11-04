<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    //      -- Relationships -- 

    public function description() {
        return $this->hasOne('App\ExpertDescription', 'expert_id');
    }



    //      -- Mutators --

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }



    //      -- Custom methods --

    public function displayData() {
        $data['name'] = $this->name;
        $data['type'] = $this->type;
        return $data;
    }

    public function token() {
        return '123456';
    }

    public static function getExperts() {
        return static::where('type', 'expert');
    }
}
