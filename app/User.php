<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use JWTAuth;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = [
        'name', 'email', 'password', 'type'
    ];

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

    public function companyDescription() {
        return $this->hasOne('App\companyDescription', 'company_id');
    }

    public function expertDescription() {
        return $this->hasOne('App\ExpertDescription', 'expert_id');
    }

    public function openings() {
        return $this->hasMany('App\Opening', 'company_id');
    }

    public function applications() {
        return $this->hasMany('App\Application', 'expert_id');
    }

    public function projects() {
        $flag = ($this->type == 'company') ? 1 : 0;
        return $this->hasMany('App\Project', 'owner_id')->where('owner', $flag);
    }

    public function description() {
        if ($this->type == 'expert') {
            return $this->hasOne('App\ExpertDescription', 'expert_id');
        }
        else {
            return $this->hasOne('App\CompanyDescription', 'company_id');
        }
    }



    //      -- Mutators --

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = bcrypt($value);
    }



    //      -- CRUD --

    public static function loadSingle($id) {
        $user = static::find($id);
        $user->load(['description', 'projects']);
        $message = 'Instance loaded succesfully!';
        return JSONResponse(true, 200, $message, $user);
    }

    public static function baseUpdate($id, $request) {
        $instance = static::find($id);
        $instance->fill($request->only(with(new static)->getFillable()));
        if (!$instance->save()) {
            return JSONResponse(false, 500, 'Database communication error');
        }
        if ($instance->type == 'expert') {
            $update = $request->only(['technologies', 'position', 'address', 'phonenumber', 'public']);
        }
        else {
            $update = $request->only(['description', 'founded', 'employees', 'headquarters']);
        }
        $message = 'Update completed!';
        return JSONResponse(true, 200, $message);
    }



    //      -- Custom methods --

    public function displayData() {
        $data['name'] = $this->name;
        $data['type'] = $this->type;
        return $data;
    }

    public function token() {
        $token = JWTAuth::fromUser($this);
        return $token;
    }

    public static function getExperts() {
        return static::where('type', 'expert');
    }
}
