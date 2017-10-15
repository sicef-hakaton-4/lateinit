<?php


namespace App;

use Carbon\Carbon;

trait CustomCarbon {

	//	Load format from config files

	protected function format($f) {
		$request = 'formats.' . $f;
		$format = config($request);
		return $format;
	}


	//	Create carbon instance from one of the preset formats

	protected function createFromFormat($format, $value) {
		$format = $this->format($format);
		$carb = Carbon::createFromFormat($format, $value);
		return $carb;
	}



	//	Custom Carbon instantiators

	public function timeFromDB($time) {
		return $this->createFromFormat('dbTime', $time);
	}

	public function dateFromDB($date) {
		return $this->createFromFormat('dbDate', $date);
	}

	public function dateTimeFromDB($dt) {
		return $this->createFromFormat('dbDateTime', $dt);
	}

	public function timeFromHuman($time) {
		return $this->createFromFormat('humanTime', $time);
	}

	public function dateFromHuman($date) {
		return $this->createFromFormat('humanDate', $date);
	}

	public function dateTimeFromHuman($dt) {
		$carb = $this->dateFromHuman($dt['date']);
		$time = expolde(':', $dt['time']);
		$carb->hour = $time[0];
		$carb->minute = $time[1];
		return $carb;
	}



	//	Methods for working with days

	public function dayToString($day) {
		$days = $this->format('days');
		if (isset($days[$day])) {
			return $days[$day];
		}	
		return false;
	}

	public function dayToInteger($day) {
		$day = strtolower($day);
		$days = $this->format('days');
		foreach ($days as $int => $str) {
			if ($str == $day) {
				return $int;
			}
		}
		return false;
	}

}