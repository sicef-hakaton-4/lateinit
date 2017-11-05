<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Opening;

use App\User;

use Carbon\Carbon;

class Interview extends BaseModel
{
   	
   	public static function schedule($dateTime, $openingId, $expertId) {
   		$int = new static;
   		$int->openingId = $openingId;
   		$int->expertId = $expertId;
   		$appointment = new Carbon($dateTime);
   		$int->appointment = $appointment->toDateTimeString();
   		$int->save();
   		return $int;
   	}

}
