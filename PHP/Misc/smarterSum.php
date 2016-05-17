<?php 
	function sum($number) {
		$sum = 0;
		for($i = 1; $i <= $number; $i++ ) {
			$sum += $i;
		}
		echo $sum;
	}

	sum(30);
 ?>