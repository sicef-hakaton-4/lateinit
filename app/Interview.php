<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Opening;

use App\User;

use Carbon\Carbon;

class Interview extends BaseModel
{

	public function application() {
		return $this->belongsTo('App\Application');
	}
   	
   	public static function schedule($dateTime, $applicationId) {
   		$int = new static;
   		$int->application_id = $applicationId;
   		$appointment = new Carbon($dateTime);
   		$int->appointment = $appointment->toDateTimeString();
   		$int->save();
   		$int->notify();
   		return $int;
   	}

   	public function notify() {
   		$mail = $this->application->expert->email;
   		$name = $this->application->expert->name;
   		
   	}

}
