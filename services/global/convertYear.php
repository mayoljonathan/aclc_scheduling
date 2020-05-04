<?php 
	function convertYear($year){
		if($year == 1){
			$year = 'FIRST YEAR';
		}else if($year == 2){
			$year = 'SECOND YEAR';
		}else if($year == 3){
			$year = 'THIRD YEAR';
		}else if($year == 4){
			$year = 'FOURTH YEAR';
		}else{
			$year = 'FIFTH YEAR';
		}

		return $year;
	}
?>