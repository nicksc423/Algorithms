<?php 
	echo string2Number("weeeeee128302190312ljfklsdjfkdsl1jsklsjsa  adjskal;djkwla;");
	function string2Number($string) {
		$sum = 0;
		$holder = -1;
		for($i=0; $i<strlen($string); $i++) {
			if(preg_match("/[0-9]/", $string[$i])) {
				if($holder == -1) {
					$holder = intval($string[$i]);
				} else {
					$holder *= 10;
					$holder += intval($string[$i]);
				}
			} else {
				if($holder != -1) {
					$sum += $holder;
				}
				$holder = -1;
			}
		}
		if($holder != -1) {
			$sum += $holder;
		}
		return $sum;
	}
 ?>