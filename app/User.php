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



    //      -- Accessors -- 

    public function getTypeAttribute($value) {
        if (is_string($value)) {
            return $value;
        }
        if ($value == 1) {
            return 'expert';
        }
        return 'company';
    }



    //      -- Relationships -- 

    public function description() {
        return $this->hasOne('App\ExpertDescription', 'expert_id');
    }



    //      -- Mutators --

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }



    //      -- CRUD --

    public static function loadSingle($id) {
        if (property_exists(static::class, 'relationships')) {
            $instance = static::with(static::$relationships)->where('id', $id)->get();
        }
        else {
            $instance = static::find($id);
        }
        if (!$instance) {
            $message = 'Not found';
            return JSONResponse(false, 404, $message);
        }
        $message = 'Instance loaded succesfully!';
        return JSONResponse(true, 200, $message, $instance);
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
