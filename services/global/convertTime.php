<?php 
	function convertTime($time){
		list($hour, $minute) = split(":", $time, 2);
		if($hour < 12){

			if($hour == 0){
				$hour = 12;
			}

			if($hour < 10){
				$time = substr(ltrim($hour, 0).":".$minute, 0, 4);
			}else{
				$time = substr($time, 0, 5);
			}

			return $new_time = $time." AM";

		}else if($hour == 12 && $minute == 0){

			if($hour < 10){
				$time = substr(ltrim($hour, 0).":".$minute, 0, 4);
			}else{
				$time = substr($time, 0, 5);
			}

			return $new_time = $time." NN";

		}else{

			if($hour != 12){
				$hour -= 12;
			}

			if($hour < 10){
				$time = substr(ltrim($hour, 0).":".$minute, 0, 4);
			}else{
				$time = substr($hour.":".$minute, 0, 5);
			}

			return $new_time =  $time." PM";
		}
	}
?>
